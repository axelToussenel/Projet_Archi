from pymongo import MongoClient
import pandas as pd
import csv 
from dateutil import parser
import json 


# Connexion à la base de données MongoDB
client = MongoClient("mongodb://127.0.0.1:27017/?directConnection=true&serverSelectionTimeoutMS=2000&appName=mongosh+1.6.")
db = client["Projet"]

# Construction de la pipeline d'agrégation
result=db["PIB_Dep_Reg"].aggregate(pipeline = [
    {"$lookup":
        {
            "from": "Voiture_LC_brut",
            "localField": "Departements",
            "foreignField": "Departements",
            "as": "Listes_Voitures"
        }
    }
]);



new_collection = db["Voitures_PIB"]
new_collection.insert_many(result)



# Fermeture de la connexion
client.close()
