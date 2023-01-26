<?php
    include_once 'connection.php';

    // chemin d'accès à votre fichier JSON
    $file = 'velib-disponibilite-en-temps-reel-13-01.json'; 
    // mettre le contenu du fichier dans une variable
    $data = file_get_contents($file); 
    // décoder le flux JSON
    $obj = json_decode($data); 
    // accéder à l'élément approprié

    for ($i = 0; $i < 1450; $i++) {
                    
        if (isset($_POST['submit'])) {
            $post_data = array();
            $post_data['_id']                           = md5(uniqid()); 
            $post_data['code']                          = $obj[$i]->stationcode;
            $post_data['name']                          = $obj[$i]->name; 
            $post_data['is_installed']                  = $obj[$i]->is_installed;
            $post_data['numdocksavailable']             = $obj[$i]->numdocksavailable;
            $post_data['numbikesavailable']             = $obj[$i]->numbikesavailable;
            $post_data['mechanical']                    = $obj[$i]->mechanical;
            $post_data['ebike']                         = $obj[$i]->ebike;
            $post_data['capacity']                      = $obj[$i]->capacity;
            $post_data['is_renting']                    = $obj[$i]->is_renting;
            $post_data['duedate']                       = $obj[$i]->duedate;
            $post_data['nom_arrondissement_communes']   = $obj[$i]->nom_arrondissement_communes;
                
            if ($post_data['_id'] == "") {
                echo "<div class='alert alert-danger'> Required fields empty! </div>";
            }else {
                $velib->insertOne($post_data);
                header("location: index.php");
            }
                
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">

        <title>VELIB JSON</title>
    </head>


    <body>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">VELIB</a>
            </div>
        </nav>

        <div class="container">
            <div class="card mt-3 mb-3 bg-light">
                <div class="card-header text-center">
                    <h5>Ajouter des données dans la base de données à partir d'un fichier json des données velib</h5>
                </div>

                <div class="card-body">
                    <form method="POST" class="my-3 mx-3">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <input type="submit" name="submit" class="btn btn-primary" value="JSON"/>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </body>
</html>