<?php
    include_once 'connection.php';

    $id = $_GET['id'];

    $cursor = $voiture_scrap->deleteOne(["Title"=>$id]);

    header("location: index.php");
?>