<?php
    include_once 'connection.php';

    if (isset($_POST['submit'])) {
       $post_data = array();
       $post_data['Title'] = $_POST['txtTitle']; 
       $post_data['Prix'] = $_POST['txtPrix'];
       $post_data['Departement'] = $_POST['txtDepartement'];
       $post_data['Date du jour'] = $_POST['txtDate'];

       if (($post_data['Title']=="")||($post_data['Prix']=="")||($post_data['Departement']=="")) {
            echo "<div class='alert alert-danger'> Required fields empty! </div>";
        }else {
            $voiture_scrap->insertOne($post_data);
            header("Refresh:0");
        }

       

       $post_data = array();
       $_POST = array();
       
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Ajouter  une voiture : </title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Une nouvelle voiture à l'horizon !</a>
            </div>
    </nav>
    <div class="container">
        <div class="card mt-3 mb-2 bg-light">
            <h4 class="card-title mx-auto mt-4">New car Form</h4>
            <div class="card-body">
                <form method="POST" class="my-3 mx-3">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" placeholder="ex: Porshe 911 Turbo S" class="form-control" id="title" name="txtTitle" aria-describedby="title">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" placeholder="ex: 100 000" class="form-control" id="prix" name="txtPrix" aria-describedby="prix">
                    </div>
                    <div class="mb-3">
                        <label for="departement" class="form-label">Departement</label>
                        <input type="number" placeholder="ex: 75" class="form-control" id="departement" name="txtDepartement" aria-describedby="departement">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date du jour</label>
                        <input type="text" placeholder="ex: 2023-01-13" class="form-control" id="date" name="txtDate" aria-describedby="date">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input type="submit" name="submit" class="btn btn-primary" value="Insert a new car"/>
                        <a href="index.php" class="btn btn-warning">View voiture</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>