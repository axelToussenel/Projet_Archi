import matplotlib.pyplot as plt
import pandas as pd
import numpy as np
import csv
from dateutil import parser
import json 
import seaborn as sns
from pymongo import MongoClient 


CONNECTION_STRING="mongodb://127.0.0.1:27017/?directConnection=true&serverSelectionTimeoutMS=2000&appName=mongosh+1.6.1"
client = MongoClient(CONNECTION_STRING)


print("Connexion établie")

mydb = client["Projet"]
mycol = mydb["Voitures_PIB"]
mydb2 = client["Projet"]
mycol2 = mydb2["PIB_Dep_Reg"]



d_moyennes = dict({})  
d_moyennes2 = dict({})  

for x in mycol.aggregate( [{ "$project":{"_id" : 0, "prix":"$Listes_Voitures.prix", "Region" : 1}} ] ):
    if len(x['prix'])!=0:
        if x['Region'] in d_moyennes2:
            d_moyennes2[x['Region']]= d_moyennes2[x['Region']] + x['prix']
        else:
            d_moyennes2[x['Region']]= x['prix']
         

 
for cle,valeur in d_moyennes2.items():
    d_moyennes[cle]=round((sum(valeur) / len(valeur)),2)


    
fig, (ax1, ax2) = plt.subplots(nrows=1, ncols=2, figsize=(15, 5))
plt.suptitle('Prix des véhicules / Pib de la région', fontsize=16)
for cle,valeur in d_moyennes.items():
    ax1.bar(cle, valeur)
for x in mycol2.find({},{ "_id": 0, "Rang": 1, "Departements": 1, "PIB_dep_euros": 1, "Numero_Departement": 1, "Region": 1, "PIB_Region (en milliard euro)": 1 }):
    ax2.bar(x['Region'], x["PIB_Region (en milliard euro)"])
ax1.set_title('Prix des véhicules')
ax2.set_title('Pib de la région')
plt.subplots_adjust(left=0.2, wspace=0.2, top=0.85) 
ax1.set_xticklabels(d_moyennes.keys(),rotation = 90)
ax2.set_xticklabels(d_moyennes.keys(),rotation = 90)
plt.show()