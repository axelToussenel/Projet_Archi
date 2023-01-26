# Projet d'Architecture Bases de Données


## Introduction du projet <img src="https://user-images.githubusercontent.com/91553182/212089986-df034cbe-2b2b-4f05-802b-cd0afbfb6e46.png"  width="30" height="30"/>


Ce github contient notre projet d'Architecture Bases de Données encadré par M. GUILLOCHET. Nous avons décidé de travailler sur une corrélation entre la **santé des marque de voiture par rapport à leur cotation boursière** et au **nombre de voitures d'occasion vendu par ces marques**. Pour les ventes de voitures d'occasion selon les régions, nous avons scrappé le site web "La Centrale" avec l'extension Chrome "[Webscrapper](https://webscraper.io/)". Pour les cotations boursières, on a simplement récupéré un fichier csv sur un site web spécialisé.

Au niveau de l'affichage, nous avons opté pour une petite interface web comportant un bouton pour actualiser les données et différentes informations qui sont affichées.


## Prérequis <img src="https://user-images.githubusercontent.com/91553182/212090262-3d9efbb5-a01b-4965-94ca-73e180410f7b.png"  width="30" height="30"/>


Pour exécuter ce projet, vous aurez besoin de plusieurs choses. 
Nous avons créé un fichier requirements.txt pour installer toutes les dépendances nécessaires.

### Ci-dessous le détail de tout ce dont vous aurez besoin :

  - [**Python**](https://www.python.org/)
  - [**Xampp**](https://www.apachefriends.org/fr/download.html) (télécharger la version 8.1 car c'est la dernière version où Mongo fonctionne)
  - [**MongoDB shell**](https://www.mongodb.com/try/download/shell)
  
  - [**MongoDB Compass**](https://www.mongodb.com/products/compass) (pas obligatoire mais intéressant pour gérer facilement et visualiser ses collections)


Dépendances installées par requirements.txt :

  - [**Numpy**](https://numpy.org/install/) 
  - [**Pandas**](https://pandas.pydata.org/) 
  - [**Flask**](https://flask.palletsprojects.com/en/2.2.x/) 
  - [**Bs4**](https://pypi.org/project/bs4/) 
  - [**Pymongo**](https://www.mongodb.com/docs/drivers/pymongo/) 
  - [**DateTime**](https://pypi.org/project/DateTime/) 
  - [**Matplotlib**](https://matplotlib.org/stable/users/installing/index.html) 
  - [**Seaborn**](https://seaborn.pydata.org/installing.html) 
  - [**Dateutil**](https://pypi.org/project/python-dateutil/) 

Lancez la commande suivante pour tout installer :

```
pip install requirements.txt
```

# Mise en place du projet

## I) Utiliser Xampp <img src="https://img.icons8.com/stickers/100/null/servers-group.png"  width="30" height="30"/>


  1) Pour que votre appli web fonctionne, assurez-vous d'avoir placé votre projet dans le dossier **htdocs** de Xampp. 
  2) Ensuite, lancez Xampp et cliquez sur le bouton **Start** en face de l'intitulé **Apache**.
  3) Rajouter une extension **.dll** (php_mongodb.dll) qui sera fourni, dans le chemin suivant: **C:\xampp\php\ext**.
  4) Remplacer le fichier **php.ini**, dans le chemin suivant: **C:\xampp\php**.


## II) Mettre en place notre base de données NoSQL <img src="https://user-images.githubusercontent.com/91553182/212089016-39ea5621-a6ce-4ef7-8f4f-4e0685236147.png"  width="30" height="30"/>


  1) Ouvrir VSCODE et ouvrir le dossier du site (Voiture).
  2) Ouvrir le dossier de la base de données (qui sera fournis).
  3) Ouvrir MongoDB Compass à côté pour visualiser les collections qui s'insèrent.
  4) Lancer les scripts python (dans VSCode) dans l'ordre suivant: les 3 programmes **insert**(Dossier_bddanalyse/prog_insertScrap_Mongo.py, prog_insert_reg_dep_PIB.py, prog_insert_voiture_brut_LC.py) puis l'**agregate**(Dossier_bddanalyse/Agregate_collection.py).
  
Lors de l'ouverture de MongoDB Compass, une fois s'être connecté, après l'insertion des programmes python précédents, nous obtenons donc 4 collections distinctes dans une base de données qui s'appelle **Projet**.
  - PIB_Dep_Reg : Cette collection est notre 1er dataset brut, il contient les PIB des différents départements et régions en France.
  - Voiture_LC_brut : Cette collection est le 2nd dataset brut qui contient des données provenant du site **La Centrale**.
  - Voiture_live_scrap : Celle-ci est notre dataset dynamique qui contient donc les dernières voitures en vente sur La Centrale en fonction du département et de la région.
  - Voitures_PIB : Cette dernière collection est l'assemblage des 2 premiers datasets bruts(ci-dessus) grâce une fonction **aggregate**.


## III) Lancer l'appli web <img src="https://img.icons8.com/color/96/null/internet--v1.png"  width="30" height="30"/>


  1) Sur VSCode, dans le dossier du site, lancer le run_server_flask.
  2) Rendez-vous à l'adresse **http://localhost/voiture/** sur votre navigateur favori et l'application est là !


----------

## Analyse des données


Pour visualiser les différents diagrammes de l'analyse, lancez les fichier suivants que vous trouverez dans Dossier_bddanalyse.
  - aMoyPrixVoitureDep.py : Cette analyse nous permet de visualiser la moyenne des prix des véhicules en vente sur La Centrale en fonctions de leurs départements.
  - aPibDep.py : Cette visualisation nous permet de voir le PIB en fonction des départements.
  - aPibReg.py : Cette visualisation nous permet de voir le PIB en fonction des régions.
  - aPrixEtPibParDep.py : Cette visualisation affiche 2 diagrammes : l'un affiche les prix des véhicules en fonction des départements, l'autre affiche le PIB en fonction des départements.
  - aPrixEtPibParReg.py : Cette visualisation affiche 2 diagrammes : l'un affiche les prix des véhicules en fonction des régions, l'autre affiche le PIB en fonction des régions.


----------

## Utiliser MongoDB


Vous pouvez utiliser un invite de commandes MongoDB pour modifier les données de votre base NoSQL. Ci-dessous quelques commandes de base si vous voulez vous essayer à Mongo Shell.

Pour lancer Mongo Shell, rendez-vous sur le dossier de votre MongoDB Shell > bin > mongo.exe

Si vous voulez afficher les collections de la base :
```python
show collections
```

Si vous voulez visualiser tout le contenu de la collection :
```python
db.collection.find()
```

Si vous voulez rechercher une valeur en particulier :
```python
db.collection.find({ nom_de_la_colonne: 'valeur' })
```

Si vous voulez ajouter un élément à votre base :
```python
db.collection.insertOne({ nom_de_la_colonne : 'valeur', nom_de_la_colonne_2 : 'valeur'})
```

Si vous voulez supprimer un élément à votre base :
```python
db.collection.deleteOne({ "_id": x })
```

Si vous voulez modifier un élément à votre base :
```python
db.collection.updateOne({ _id: x }, { $set: { "nom_de_la_colonne": "valeur" } })
```
