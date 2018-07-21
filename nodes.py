class Program:
    def __init__(self):
        self.id = ""
        self.share = 0
        self.current = 0
        self.previous = 0
        self.current_transactions = []

    def new_transaction(self, sender, recipient, amount):
        """
        Creates a new transaction to go into the next mined Block

        :param sender: Address of the Sender
        :param recipient: Address of the Recipient
        :param amount: Amount
        :return: The index of the Block that will hold this transaction
        """
        self.current_transactions.append({
            'id': self.id,
            'amount': amount,
        })
        # Call Chain


class Media:
    def __init__(self):
        self.id = ""
        self.init = 0
        self.previous = 0
        self.current_transactions = []
