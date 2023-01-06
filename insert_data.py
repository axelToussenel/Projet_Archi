from pymongo import MongoClient
import csv
import json
import pandas as pd
from dateutil import parser

def get_database():
    CONNECTION_STRING=""
    client = MongoClient(CONNECTION_STRING)
    return(client)

def get_collection(client):
    db=client['AtlasCluster']
    collection_name=db[""]
    return(collection_name)

db=get_database()
collection=get_collection(db)

data = pd.read_csv('', sep="\t")
#basic_l.replace('\\N', None, inplace=True)
#basic_l[""] = basic_l[""].str.split(",")

output = data.to_dict('records')
collection.insert_many(output)
