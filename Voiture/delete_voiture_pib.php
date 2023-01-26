<?php
    include_once 'connection.php';

    $id = $_GET['Rang'];

    $cursor = $voiture_PIB->delete(["Rang"=>$id]);

    header("location: index.php");
?> 