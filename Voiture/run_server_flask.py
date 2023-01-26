from flask import Flask, render_template
import requests
from bs4 import BeautifulSoup
import csv
import re
import pandas as pd
from pymongo import MongoClient
from datetime import *
import uuid
from flask import Flask
app = Flask(__name__)

@app.route("/", methods=["GET"])
def scrap():

    client = MongoClient("mongodb://127.0.0.1:27017/?directConnection=true&serverSelectionTimeoutMS=2000&appName=mongosh+1.6.1")
    db = client["Projet"]
    collection = db["Voiture_live_scrap"]

    cpt = 1
    max = 10
    list_scrab = []
    for cpt in range(max):
            URL = "https://www.lacentrale.fr/listing?makesModelsCommercialNames=&options=&page=" + str(cpt)
            page = requests.get(URL)

            soup = BeautifulSoup(page.content, "html.parser")
            annonce = soup.find("div",{"class":"searchCard__rightContainer"})

            data = []
            if annonce:
                for car in annonce:
                    
                    titre = soup.findAll("span", {"class":"searchCard__makeModel"})
                    prix = soup.findAll("span", {"class":"text text-left text-color5 text-big text-regular"})
                    dep = soup.findAll("div", {"class":"searchCard__dptCont"})
                    data.append([ titre, prix, dep])
                    if(len(titre)==len(prix)==len(dep)):
                        for i in range(len(titre)):
                            prix_voiture=prix[i].text
                            prix_voiture=re.sub('€','',prix_voiture)
                            prix_voiture=re.sub('\xa0','',prix_voiture)
                            today = datetime.today().strftime('%Y-%m-%d')
                            list_scrab.append([titre[i].text,int(prix_voiture),int(dep[i].text),today])


    df = pd.DataFrame(list_scrab, columns=["Title","Prix","Departement","Date du jour"])

    records = df.to_dict(orient='records')

    print(df.dtypes)

    collection.insert_many(records)

    print("Les données ont bien été ajoutées !")

    return("success")

if __name__ == '__main__':
  app.run(debug=True)
