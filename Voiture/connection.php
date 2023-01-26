<?php
    require 'vendor/autoload.php';

    // Connexion à MongoDB
    $client = new MongoDB\Client("mongodb://127.0.0.1:27017/?directConnection=true&serverSelectionTimeoutMS=2000&appName=mongosh+1.6.1");

    // Création de la base de données
    $db = $client->Projet;

    // Création de la collection
    //$db->createCollection("collection_velib");

    $voiture_scrap = $db->Voiture_live_scrap;
    $voiture_PIB = $db->Voitures_PIB;
?>