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
    collection_name=db["Voiture_LC_brut"]
    return(collection_name)
client=get_database()
collection_name=create_db_collection(client)

csvfile = pd.read_csv("voiture_donnees_brut_LC.csv", sep=";",encoding='ANSI')
reader = csv.DictReader( csvfile )


csvfile.replace('\\N', None, inplace = True)

#csvfile["Region"]= csvfile["Region"].str.split(";", expand = False)
#csvfile["PIB (milliards d'euros)"]= csvfile["PIB (milliards d'euros)"].str.split(";", expand = False)


header= ["modele_marque","prix","localisation","Departements","Region"]
collection_name.create_index('modele_marque')
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
