<?php
    include_once 'connection.php';

    $id = $_GET['id'];

    $cursor = $voiture_scrap->findOne(["Title"=>$id]);
    #var_dump($cursor);

    if (isset($_POST['submit'])) {

        $post_data = array();
        $post_data['_id']                  = $_POST['txtid'];
        $post_data['Date du jour']                  = $_POST['txtduedate'];
        $post_data['Title']                          = $_POST['txtTitle'];
        $post_data['Prix']                          = $_POST['txtPrix'];
        $post_data['Departement']                  = $_POST['txtDepartement'];
     
        $result = $voiture_scrap->updateOne(['Title'=>$post_data['Title']],['$set'=>$post_data],['upsert' => true]);
        header("location: index.php");
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
    <title>Update cars</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Une mise à jour concernant une voiture arrive !</a>
            </div>
    </nav>
    <div class="container">
        <div class="card mt-3 mb-2 bg-light">
            <h4 class="card-title mx-auto mt-4">Update voiture</h4>
            <div class="card-body">
                <form method="POST" class="my-3 mx-3">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input type="text" readonly value="<?php echo $cursor['_id']; ?>" class="form-control" id="id" name="txtid" aria-describedby="id">
                    </div>
                    <div class="mb-3">
                        <label for="duedate" class="form-label">Actualisation de la donnée</label>
                        <input type="datetime" readonly value=" <?php $dateTime = new DateTime('NOW'); echo $dateTime->format(DateTimeInterface::W3C); ?>" class="form-control" id="duedate" name="txtduedate" aria-describedby="duedate">
                    </div>
                    <div class="mb-3">
                        <label for="Title" class="form-label">Titre : </label>
                        <input type="text" value="<?php echo $cursor['Title']; ?>" class="form-control" id="Title" name="txtTitle" aria-describedby="Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="Prix" class="form-label">Prix :</label>
                        <input type="text" value="<?php echo $cursor['Prix']; ?>" class="form-control" id="Prix" name="txtPrix" aria-describedby="Prix" required>
                    </div>
                    <div class="mb-3">
                        <label for="Departement" class="form-label">Departement : </label>
                        <input type="text" readonly value="<?php echo $cursor['Departement']; ?>" class="form-control" id="Departement" name="txtDepartement" aria-describedby="Departement" required>
                    </div>
                  
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input type="submit" name="submit" class="btn btn-success" value="Update"/>
                        <a href="index.php" class="btn btn-warning">View voiture</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>