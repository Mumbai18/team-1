class Program:
    def __init__(self):
        self.id = ""
        self.share = 0
        self.current = 0
        self.previous = 0
        self.current_transactions = []

    def new_transaction(self, amount):
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

    def new_transaction(self, amount):
        self.current_transactions.append({
            'id': self.id,
            'amount': amount,
        })
        # Call Chain
