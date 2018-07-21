import hashlib
import json
from time import time
from urllib.parse import urlparse
from uuid import uuid4

import threading


class Allockchain():
    def __init__(self):
        self.current_transactions = []
        self.chain = []

        # Create the genesis block
