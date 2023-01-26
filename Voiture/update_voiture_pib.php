<?php
    include_once 'connection.php';

    $id = $_GET['id'];

    $cursor = $voiture_PIB->findOne(["_id"=>$id]);
    #var_dump($cursor);

    if (isset($_POST['submit'])) {

        $post_data = array();
        $post_data['id'] = $_POST['txtId']; 
        $post_data['Rang'] = $_POST['txtRang']; 
        $post_data['Departements'] = $_POST['txtDepartement'];
        $post_data['PIB_dep_euros'] = $_POST['txtPIB_dep'];
        $post_data['Numero département'] = $_POST['txtNumDepartement'];
        $post_data['Region'] = $_POST['txtRegion'];
        $post_data['PIB_Region (en milliard euro)'] = $_POST['txtPIB_reg'];
        $post_data['prix'] = $_POST['txtprix'];
     
        $result = $voiture_pib->updateOne(['_id'=>$post_data['id']],['$set'=>$post_data],['upsert' => false]);
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
                        <input type="text" readonly value="<?php echo $cursor['_id']; ?>" class="form-control" id="id" name="txtId" aria-describedby="id">
                    </div>
                    <div class="mb-3">
                        <label for="Rang" class="form-label">Rang</label>
                        <input type="number" placeholder="ex: 1" class="form-control" id="Rang" name="txtRang" aria-describedby="Rang">
                    </div>
                    <div class="mb-3">
                        <label for="Departements" class="form-label">Departement</label>
                        <input type="number" placeholder="ex: 75" class="form-control" id="Departements" name="txtDepartement" aria-describedby="Departements">
                    </div>
                    <div class="mb-3">
                        <label for="PIB_dep_euros" class="form-label">PIB_dep_euros</label>
                        <input type="number" placeholder="ex: 30 000" class="form-control" id="PIB_dep_euros" name="txtPIB_dep" aria-describedby="PIB_dep_euros">
                    </div>
                    <div class="mb-3">
                        <label for="Numero département" class="form-label">Numero département</label>
                        <input type="number" placeholder="ex: 75" class="form-control" id="Numero département" name="txtNumDepartement" aria-describedby="Numero département">
                    </div>
                    <div class="mb-3">
                        <label for="Region" class="form-label">Region</label>
                        <input type="text" placeholder="ex: ile-de-france" class="form-control" id="Region" name="txtRegion" aria-describedby="Region">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">prix</label>
                        <input type="number" placeholder="ex: 50 000" class="form-control" id="prix" name="txtprix" aria-describedby="prix">
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