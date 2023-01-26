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

for x in mycol.aggregate( [{ "$project":{"_id" : 0, "prix":"$Listes_Voitures.prix", "Departements" : 1}} ] ):
    m=0
    n=len(x['prix'])
    #print(x['Departements'],len(x['prix']))
    for cpt in x['prix']:
        m = m + cpt
    if(n==0):
        d_moyennes[x['Departements']] =0
    else:
        m = m/n
        d_moyennes[x['Departements']] = round(m , 2)

    




    
fig, (ax1, ax2) = plt.subplots(nrows=1, ncols=2, figsize=(15, 5))
plt.suptitle('Prix des véhicules / Pib du Departement', fontsize=16)
for cle,valeur in d_moyennes.items():
    print(cle, valeur)
    ax1.bar(cle, valeur, color='black')
for x in mycol2.find({},{ "_id": 0, "Rang": 1, "Departements": 1, "PIB_dep_euros": 1, "Numero_Departement": 1, "Region": 1, "PIB_Region (en milliard euro)": 1 }):
    ax2.bar(x['Departements'], x["PIB_dep_euros"])
ax1.set_title('Prix des véhicules')
ax2.set_title('Pib du Departement')
plt.subplots_adjust(left=0.2, wspace=0.2, top=0.85) # ajuster la position et l'espacement des graphes
ax1.set_xticklabels(d_moyennes.keys(),rotation = 90)
ax2.set_xticklabels(d_moyennes.keys(),rotation = 90)
plt.show()