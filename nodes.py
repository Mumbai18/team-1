avg_finance_percent = 0.6
avg_childcare_percent = 0.2
init_media1 = 50000
init_media2 = 50000


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

    def new_node(self, share, name):
        self.share = share
        self.id = name
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

    def new_node(self, init, name):
        self.init = init
        self.id = name
        # Call Chain
