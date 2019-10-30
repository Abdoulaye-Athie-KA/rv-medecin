<?php

include '_inc.php';
// include '../class/ConnexionBD.php';
include '../class/Requette.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>secretaire hopital</title>
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
            <a class="nav-link js-scroll-trigger" href="ajoupatient.php">AJOUTER PATIENTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="listerpatient.php">LISTER PATIENTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="fixerrv.php">FIXER RENDEZ-VOUS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="listerrv.php">LISTER RENDEZ-VOUS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="ajouespecialite.php"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact"></a>
          </li>
          <div>
              <a href="secretaire.php" class="btn btn-block btn-primary text-uppercase">Accueil</a>
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
            <h5 class="card-title text-center">Ajouter Patient</h5>
            <form method="POST"  action="" class="form-signin">

            <?php
             $form= new Form();
             ?>
              
              <div class="form-label-group">
                <?= $form->input('text','numero','Numero Dossier','');?>
              </div>

              <div class="form-label-group">
                <?= $form->input('text','nom','Nom','');?>
              </div>

              <div class="form-label-group">
                <?= $form->input('text','prenom','Prénom','');?>
              </div>

              <div class="form-label-group">
              <?= $form->input('date','date','Date de Naissance','');?>
              </div>

              <div class="form-label-group">
              <?= $form->input('text','adresse','Adresse','');?>
              </div>

              <div class="form-label-group">
              <?= $form->input('number','telephone','TEL','');?>
              </div>

              <div class="form-label-group">
                <?= $form->input('number','cni','CNI','');?>
              </div>

             
              <div class="form-label-group">
              <?= $form->submit('Envoyer');?>
              </div>
              
              <?php
              if(isset($_POST['submit'])){ 
                $numero = $_POST['numero'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $date = $_POST['date'];
                $adresse = $_POST['adresse'];
                $telephone = $_POST['telephone'];
                $cni =$_POST['cni'];
                $nomtable='patient';
                 $cle = "numero_dossier, nom_patient, prenom_patient, date_de_naissance, adresse, tel, cni";
                $valeur = "$numero', '$nom','$prenom', '$date','$adresse','$telephone','$cni";
                 if(empty($numero) && empty($nom) && empty($prenom) && empty($date) && empty($adresse) && empty($telephone) && empty($cni) ){
                  echo 'veuillez remplire les champs';
                }elseif (preg_match("/^(77||78||76||70)[0-9]{7}*$/",$telephone)){
                  echo 'Veuillez entrez un numéro de téléphone valide';
                }elseif(preg_match("/^[a-zA-Z]+$/",$nom,$prenom,$adresse)){
                  echo "veuillez entrer un nom valide svp!";
                }else{
                  $add = new Requette();
                  $res = $add->insert($nomtable,$cle,$valeur);
                         echo "ajoue Patient réussit";
                 }
               
                }
              ?>
      
            
              
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
