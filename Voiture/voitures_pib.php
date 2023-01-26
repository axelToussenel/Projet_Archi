<?php
    include_once 'connection.php';

    // Affichage de la Base de données
    $filter = [];
    $cursor = $voiture_PIB -> find($filter);
    #var_dump ($cursor);
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

        <title>Voiture PIB</title>
    </head>


    <body>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Vehicules et leur PIB</a>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="card mt-3 mb-3 bg-light">
                <div class="card-header text-center">
                    <h5>Tous les véhicules actualisés : <?php echo ($voiture_PIB->count()); ?> Lignes </h5>
                </div>
                
                <form method="GET" class="d-flex">
                    <input class="form-control me-2" type="text" name="searchcode" placeholder="Search by code">
                    <input type="submit" name="valider" class="btn btn-primary" value="SEARCH"/>
                </form>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mt-0">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">id :</th>
                                    <th scope="col">rang :</th>
                                    <th scope="col">Departement</th>
                                    <th scope="col">PIB_dep_euros</th>
                                    <th scope="col">Numero département</th>
                                    <th scope="col">Region</th>
                                    <th scope="col">PIB_Region (en milliard euro)</th>
                                    <th scope="col">prix</th>
                                    <th scope="col">Modele marque</th>
                                
                                    
                                    <th scope="col" style="text-align:right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (empty($result)) {

                                    foreach($cursor as $document) {
                                        for ($i=0; $i<50; $i++) {
                                            ?>
                                        <tr>
                                            <td><?php echo $document['_id']; ?></td>
                                            <td><?php echo $document['Rang']; ?></td>
                                            <td><?php echo $document['Departements']; ?></td>
                                            <td><?php echo $document['PIB_dep_euros']; ?></td>
                                            <td><?php echo $document['Numero_Departement']; ?></td>
                                            <td><?php echo $document['Region']; ?></td>
                                            <td><?php echo $document['PIB_Region (en milliard euro)']; ?></td>
                                            <td><?php echo $document['Listes_Voitures'][$i]['prix']; ?></td>
                                            <td><?php echo $document['Listes_Voitures'][$i]['modele_marque']; ?></td>
                                            <td style="text-align:right">
                                                <a href="delete_voiture_pib.php?id=<?php echo $document['Rang']; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <a href="update_voiture_pib.php?id=<?php echo $document['Rang']; ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </td> 
                                        </tr>
                                    <?php } 
                                    }
                                }
                                else {
                                    foreach($result as $res) { ?>
                                        <tr>
                                            <td><?php echo $document['_id']; ?></td>
                                            <td><?php echo $document['Rang']; ?></td>
                                            <td><?php echo $document['Departements']; ?></td>
                                            <td><?php echo $document['PIB_dep_euros']; ?></td>
                                            <td><?php echo $document['Numero_Departement']; ?></td>
                                            <td><?php echo $document['Region']; ?></td>
                                            <td><?php echo $document['PIB_Region (en milliard euro)']; ?></td>
                                            <td><?php echo $document['Listes_Voitures'][$i]['prix']; ?></td>
                                            <td><?php echo $document['Listes_Voitures'][$i]['modele_marque']; ?></td>
                                            <!-- Button -->
                                            <td style="text-align:right">
                                                <a href="delete_voiture_pib.php?id=<?php echo $res['Departements']; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <a href="update_voiture_pib.php?id=<?php echo $res['Departements']; ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } 
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <a class="d-grid gap-2 col-6 mx-auto float my-5 mx-3" href="add_voiture_pib.php">ADD</a>
            </div>                   
            <div class="card-body">
                <form method="POST" class="my-3 mx-3">
                    <div class="d-grid gap-2 col-6 mx-auto float">
                        <input type="submit" name="submit" class="btn btn-primary" value="LIVE"/>
                    </div>
                </form>
            </div>

        </div>
    </body>
</html>