# Projet d'Architecture Bases de Données


## Introduction du projet

Ce github contient notre projet d'Architecture Bases de Données encadré par M. GUILLOCHET. Nous avons décidé de travailler sur une corrélation entre la **santé des marque de voiture par rapport à leur cotation boursière** et au **nombre de voitures d'occasion vendu par ces marques**. Pour les ventes de voitures d'occasion selon les régions, nous avons scrappé le site web "La Centrale" avec l'extension Chrome "[Webscrapper](https://webscraper.io/)". Pour les cotations boursières, on a simplement récupéré un fichier csv sur un site web spécialisé.

Au niveau de l'affichage, nous avons opté pour une petite interface web comportant un bouton pour actualiser les données et différentes informations qui sont affichées.


## Prérequis

Pour utiliser ce projet, vous aurez besoin de plusieurs choses :

  - [Python](https://www.python.org/)
  - [MongoDB shell](https://www.mongodb.com/try/download/shell)
  - [Pandas](https://pandas.pydata.org/) :

```bash
pip install pandas
```

## Utiliser MongoDB

Vous pouvez utiliser un invite de commandes pour ajouter, supprimer ou lire les données contenues dans la base MongoDB.

Pour lancer Mongo Shell, rendez-vous sur le dossier de votre MongoDB Shell > bin > mongo.exe

Si vous voulez afficher les collections de la base :
```python
show collections
```

Si vous voulez visualiser tout le contenu de la collection :
```python
```

Si vous voulez rechercher une valeur en particulier :
```python
db.collection.find({ nom_de_la_colonne: 'valeur' })
```

Si vous voulez ajouter un élément à votre base :
```python
db.collection.insert({ nom_de_la_colonne : 'valeur', nom_de_la_colonne_2 : 'valeur'})
```

