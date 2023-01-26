# Projet d'Architecture Bases de Données


## Introduction du projet <img src="https://user-images.githubusercontent.com/91553182/212089986-df034cbe-2b2b-4f05-802b-cd0afbfb6e46.png"  width="25" height="25"/>


Ce github contient notre projet d'Architecture Bases de Données encadré par M. GUILLOCHET. Nous avons décidé de travailler sur une corrélation entre la **santé des marque de voiture par rapport à leur cotation boursière** et au **nombre de voitures d'occasion vendu par ces marques**. Pour les ventes de voitures d'occasion selon les régions, nous avons scrappé le site web "La Centrale" avec l'extension Chrome "[Webscrapper](https://webscraper.io/)". Pour les cotations boursières, on a simplement récupéré un fichier csv sur un site web spécialisé.

Au niveau de l'affichage, nous avons opté pour une petite interface web comportant un bouton pour actualiser les données et différentes informations qui sont affichées.


## Prérequis <img src="https://user-images.githubusercontent.com/91553182/212090262-3d9efbb5-a01b-4965-94ca-73e180410f7b.png"  width="25" height="25"/>


Pour utiliser ce projet, vous aurez besoin de plusieurs choses :

  - [Python](https://www.python.org/)
  - [Xampp](https://www.apachefriends.org/fr/download.html) (télécharger la version 8.1 car c'est la dernière version où Mongo fonctionne)
  - [MongoDB shell](https://www.mongodb.com/try/download/shell)
  - [Pandas](https://pandas.pydata.org/) :

```bash
pip install pandas
```

  - [Flask](https://flask.palletsprojects.com/en/2.2.x/) :

```bash
pip install -U Flask
```

  - [MongoDB Compass](https://www.mongodb.com/products/compass) (pas obligatoire mais intéressant pour gérer facilement et visualiser ses collections)


## Utiliser Xampp <img src="https://img.icons8.com/stickers/100/null/servers-group.png"  width="25" height="25"/>


Pour que votre appli web fonctionne, assurez-vous d'avoir placé votre projet dans le dossier **htdocs** de Xampp. Ensuite, lancez Xampp et cliquez sur le bouton **Start** en face de l'intitulé **Apache**.

Rendez-vous à l'adresse **localhost** sur votre navigateur favori et l'application est là !


## Utiliser MongoDB <img src="https://user-images.githubusercontent.com/91553182/212089016-39ea5621-a6ce-4ef7-8f4f-4e0685236147.png"  width="25" height="25"/>


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
