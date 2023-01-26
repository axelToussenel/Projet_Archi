import pandas as pd
import csv 
from dateutil import parser
import json 
from pymongo import MongoClient 

#csvfile = open('data.tsv', 'r')
#reader = csv.DictReader( csvfile )

def get_database():
    CONNECTION_STRING="mongodb://localhost:27017"
    client = MongoClient(CONNECTION_STRING)
    return(client)

def create_db_collection(client):
    db=client['Projet']
    collection_name=db["PIB_Dep_Reg"]
    return(collection_name)
client=get_database()
collection_name=create_db_collection(client)

csvfile = pd.read_csv("PIB_reg_dep.csv", sep=";")
reader = csv.DictReader( csvfile )

csvfile.replace('\\N', None, inplace = True)

#csvfile["Region"]= csvfile["Region"].str.split(";", expand = False)
#csvfile["PIB (milliards d'euros)"]= csvfile["PIB (milliards d'euros)"].str.split(";", expand = False)


header= [ "Rang","Departements","PIB_dep_euros","Numero_Departement","Region","PIB_Region (en milliard d'euro)"]
collection_name.create_index('Rang')
db=client['Projet']
csvfile = csvfile.head(30000)
output=csvfile.to_dict('records')

#for each in reader:
    #row={}
    #for field in header:
        #row[field]=each[field]
    #output.append(row)

#firstline=output[0]

collection_name.insert_many(output)
