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
mycol = mydb["PIB_Dep_Reg"]


for x in mycol.find({},{ "_id": 0, "Rang": 1, "Departements": 1, "PIB_dep_euros": 1, "Numero_Departement": 1, "Region": 1, "PIB_Region (en milliard euro)": 1 }):
   
    
    plt.bar(x["Region"], x['PIB_Region (en milliard euro)'])

 
    
plt.rcParams['figure.figsize']=(20, 10)    
plt.title('PIB des Régions')
plt.xlabel('Régions')
plt.ylabel('PIB')
plt.xticks(rotation = 45)
plt.show()





