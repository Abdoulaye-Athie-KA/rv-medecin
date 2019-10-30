<?php
include '_inc.php';
include_once '../class/Requette.php';
$id=$_GET['id_service'];
$sql="SELECT * FROM service WHERE id_service = $id";
$res = $bdd->query($sql);
$ligne = $res->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>admin hopital</title>
  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link type="text/css" rel="stylesheet" href="../../css/ajouemployer.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">NGUEKOKH HOSPITAL</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="ajouemployer.php">Ajouter Employers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="ajouservice.php">Ajouter Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="listerservice.php">Lister Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Lister Patients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="ajouespecialite.php">Ajouter Spécialité</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="listerspecialite.php">Lister Spécialité</a>
          </li>
          <div>
              <a href="admin.php" class="btn btn-block btn-primary text-uppercase">Accueil</a>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <div style="height:10px; background-color:#fff; padding-top:5%;"></div>

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Modifier Service</h5>
            <form method="POST"  action="" class="form-signin">

            <?php
             $form= new Form();
             ?>

              <div class="form-label-group">
                <?= $form->input('text','service','Nom Service', $ligne['nom_service']);?>
              </div>
            
             
              <div class="form-label-group">
              <?= $form->submit('Envoyer');?>
              </div>
              
              <?php
              if(isset($_POST['submit'])){  
                $service = $_POST['service']; 
                 $nomtable='service';
                 $cle='nom_service';
                             if(empty($service)){
                               echo 'veuillez remplire le champs';
                             }elseif (!preg_match("/^[a-zA-Z]+$/",$service))//le nom s'écrive en lettre seulement
                             {
                                 echo "veuillez entrer un nom valide svp!";
                             }else{
                                global $bdd;
                                $sql = "UPDATE service SET nom_service = '$service' WHERE id_service = $id";
                                $bdd->query($sql);
                                     echo " service modifier"; 
                                     header("location: listerservice.php");
                             }
                              
                }

              ?>

              <!-- <div>
              <a href="admin.php"  class="btn btn-block btn-primary text-uppercase">log out</a>
              </div> -->

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="js/creative.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>
