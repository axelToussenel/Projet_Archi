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

    
for cle,valeur in d_moyennes.items():
    print(cle, valeur)
    plt.bar(cle, valeur)
    

 
    
plt.rcParams['figure.figsize']=(20, 10)    
plt.title('Moyenne Prix Voiture / Departement')
plt.xlabel('Departement')
plt.ylabel('Moyenne_Prix')
plt.xticks(rotation = 90)
plt.show()


mydb2 = client["Projet"]
mycol2 = mydb2["PIB_Dep_Reg"]


for x in mycol2.find({},{ "_id": 0, "Rang": 1, "Departements": 1, "PIB_dep_euros": 1, "Numero_Departement": 1, "Region": 1, "PIB_Region (en milliard d'euro)": 1 }):
   
    plt.bar(x['Departements'], x['PIB_dep_euros'])
    
plt.rcParams['figure.figsize']=(20, 10)    
plt.title('PIB en milliers euros par habitants')
plt.xlabel('Nom departements')
plt.ylabel('PIB departements')
plt.xticks(rotation = 90)
plt.show()