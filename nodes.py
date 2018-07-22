import requests


avg_finance_percent = 0.6
avg_childcare_percent = 0.2
init_media1 = 50000
init_media2 = 50000

host = "0.0.0.0:5000"


class Program:
    def __init__(self):
        self.id = ""
        self.share = 0
        self.current = 0
        self.previous = 0
        self.isMedia = False
        self.current_transactions = []

    def new_transaction(self, amount):
        self.current_transactions.append({
            'id': self.id,
            'amount': amount,
        })
        # Call Chain
        requests.post(url=host+'/transactions/new', data=self.current_transactions)

    def new_node(self, share, name):
        self.share = share
        self.id = name
        nodes = {}
        data = {}
        data['share'] = self.share
        data['id'] = self.name
        data['previous'] = self.previous
        data['current'] = self.current
        data['isMedia'] = self.isMedia
        nodes['data'] = data
        # Call Chain
        requests.post(url=host+'nodes/register/', data=nodes)


class Media:
    def __init__(self):
        self.id = ""
        self.init = 0
        self.previous = 0
        self.current = 0
        self.isMedia = True
        self.current_transactions = []

    def new_transaction(self, amount):
        self.current_transactions.append({
            'id': self.id,
            'amount': amount,
        })
        # Call Chain
        requests.post(url=host+'/transactions/new', data=self.current_transactions)

    def new_node(self, init, name):
        self.init = init
        self.id = name
        nodes = {}
        data = {}
        data['init'] = self.init
        data['id'] = self.name
        data['previous'] = self.previous
        data['current'] = self.current
        data['isMedia'] = self.isMedia
        nodes['data'] = data
        # Call Chain
        requests.post(url=host+'nodes/register/', data=nodes)
