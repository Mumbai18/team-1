import hashlib
import json
from time import time

from flask import Flask, jsonify, request

optimization_rate = 0.01


class Allockchain:
    def __init__(self):
        self.chain = []
        self.total_funds = 0
        self.prev_funds = 0
        self.nodes = {}
        self.current_transactions = []
        self.proof = {}
        # Create the genesis block
        self.new_block(previous_hash='1', proof=self.proof)

    def new_block(self, proof, previous_hash):
        block = {
            'index': len(self.chain) + 1,
            'timestamp': time(),
            'transactions': self.current_transactions,
            'proof': proof,
            'previous_hash': previous_hash or self.hash(self.chain[-1]),
        }

        self.current_transactions = []

        self.chain.append(block)
        return block

    def new_transaction(self, id, amount):
        self.current_transactions.append({
            'id': id,
            'amount': amount,
        })

        return self.last_block['index'] + 1

    def register_node(self, node):
        self.nodes[node['id']] = {
            'current': node['current'],
            'previous': node['previous'],
            'isMedia': node['isMedia']
        }
        self.proof[node['id']] = node['share']

    @property
    def last_block(self):
        return self.chain[-1]

    @staticmethod
    def hash(block):
        block_string = json.dumps(block, sort_keys=True).encode()
        return hashlib.sha256(block_string).hexdigest()

    def proof_of_optimality(self, last_block):
        for n in self.nodes:
            if (self.nodes[n].isMedia):
                if self.total_funds - self.nodes[n].current - self.prev_funds < 0:
                    self.proof[n] -= optimization_rate
            else:
                if self.nodes[n].share*self.total_funds < self.prev_funds:
                    self.proof[n] -= optimization_rate
        return self.proof


app = Flask(__name__)
allockchain = Allockchain()


@app.route('/mine', methods=['GET'])
def mine():
    last_block = allockchain.last_block
    proof = allockchain.proof

    for i, transactions in enumerate(allockchain.current_transactions):
        allockchain.current_transactions[i].amount *= proof[allockchain.current_transactions[i].id]

    previous_hash = allockchain.hash(last_block)
    block = allockchain.new_block(proof, previous_hash)

    response = {
        'message': "New Block Forged",
        'index': block['index'],
        'transactions': block['transactions'],
        'proof': block['proof'],
        'previous_hash': block['previous_hash'],
    }
    return jsonify(response), 200


@app.route('/transactions/new', methods=['POST'])
def new_transaction():
    values = request.get_json()

    required = ['id', 'amount']
    if not all(k in values for k in required):
        return 'Missing values', 400

    index = allockchain.new_transaction(values['id'], values['amount'])

    response = {'message': f'Transaction will be added to Block {index}'}
    return jsonify(response), 201


@app.route('/chain', methods=['GET'])
def full_chain():
    response = {
        'chain': allockchain.chain,
        'length': len(allockchain.chain),
    }
    return jsonify(response), 200


@app.route('/nodes/register', methods=['POST'])
def register_nodes():
    values = request.get_json()

    node = values.get('data')
    if node is None:
        return "Error: Please supply a valid list of nodes", 400

    if node['isMedia']:
        allockchain.register_media_node(node)
    else:
        allockchain.register_node(node)

    response = {
        'message': 'New node has been added',
        'total_nodes': list(allockchain.nodes),
    }
    return jsonify(response), 201


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)


"""
$ curl -X POST -H "Content-Type: application/json" -d '{
 "sender": "d4ee26eee15148ee92c6cd394edd974e",
 "recipient": "someone-other-address",
 "amount": 5
}' "http://localhost:5000/transactions/new"
"""
