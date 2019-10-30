<?php

include '_inc.php';
include_once '../class/Requette.php';

// if(isset($_POST['submit'])){
//   $nom = $_POST['nom'];
//   $prenom = $_POST['prenom'];
//   $cni =$_POST['cni'];
//   $telephone = $_POST['telephone'];
//   $email = $_POST['email'];
//   $mdp1 = sha1($_POST['mdp1']);
//   $mdp2 = sha2($_POST['mdp2']);
//   $fonction [] = $_POST['fonction'];
//   $service [] = $_POST['service'];
//   $specialite [] = $_POST['specialite'];
//   if(!empty($nom) && !empty($prenom) && !empty($cni) && !empty($telephone) && !empty($email) && !empty($mdp1) && !empty($mdp2) && !empty($fonction) && !empty($service) && !empty($specialite)){
//       if(preg_match('#^(77||78||76||70)[0-9]{7}$#',  $telephone)){
//           if(filter_var($email, FILTER_VALIDATE_EMAIL)){
//               foreach ($fonction as $value) {
//               $value = intval($value);
//               $donnees = ['nom'=>$nom, 'prenom'=>$prenom, 'cni'=>$cni, 'email'=>$email, 'telephone'=>$telephone, 'mdp1'=>$mdp1, 'mdp2'=>$mdp2, 'fontion'=>$fonction, 'service'=>$service, 'specialite'=>$specialite, id_fonction'=>$value, id_service'=>$value, id_specialite'=>$value];
//               $add = new Requette();
//               $res =  $add->insert($donnees,'Employer');
//               if($res){
//                   echo ' super ça marche';
//               }else{
//                   echo 'impossible';
//               }
              
//               }
//           }else{
//               $errormail = "<p class=\alert alert-danger \ role=\alert\> Veuillez entrez une adresse email valide. </p>";
//           }
//       }else{
//           $errornumb = "<p class=\"alert alert-danger \" role=\"alert\"> Veuillez entrez un numéro de téléphone valide. </p>";
//       }
//   }else{
//       $errochamp = "<p class=\"alert alert-danger \" role=\"alert\"> Veuillez remplir tous les champs . </p>";
//   }
  
// }

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
            <h5 class="card-title text-center">Ajouter Employer</h5>
            <form class="form-signin" method="POST" >

            <?php
             $form= new Form();
             ?>

              <div class="form-label-group">
                <?= $form->input('text','nom','Nom','');?>
              </div>

              <div class="form-label-group">
                <?= $form->input('text','prenom','Prénom','');?>
              </div>

              <div class="form-label-group">
                <?= $form->input('text','cni','CNI','');?>
              </div>

              <div class="form-label-group">
              <?= $form->input('tel','telephone','TEL','');?>
              </div>

              <div class="form-label-group">
              <?= $form->input('email','email','Votre email','');?>
              </div>

              <div class="form-label-group">
              <?= $form->input('password','mdp1','mot de passe','');?>
              </div>

              <div class="form-label-group">
              <?= $form->input('password','mdp2','Confirmer le mot de passe','');?>
              </div>
              
              <?php
             
              $req = new Requette();   
              $res = $req->SelectAll('fonction');
              $liste_option= "";
              foreach ($res as $value) {

                $liste_option .= "<option value".$value['id_fonction'].">".$value['id_fonction'].'-'.$value['nom_fonction']
                ."</option>";
              }
              ?>
              <?= $form->select('fonction','choisir une fonction',$liste_option);?>


              <?php
              $req = new Requette();

              $res = $req->SelectAll('service');
              $liste_option= "";
              foreach ($res as $value) {

                $liste_option .= "<option value".$value['id_service'].">".$value['id_service'].'-'.$value['nom_service']
                ."</option>";
              }
              ?>
              <?= $form->select('service','choisir un service',$liste_option);?>


              <?php
              $req = new Requette();
              $res = $req->SelectAll('specialite');
              $liste_option= "";
              foreach ($res as $value) {

                $liste_option .= "<option value".$value['id_specialite'].">".$value['id_specialite'].'-'.$value['nom_specialite']
                ."</option>";
              }
              ?>
              <?= $form->select('specialite','choisir une spécialité',$liste_option);?>




              <div class="form-label-group">
              <?= $form->submit('submit','submit','Envoyer');?>
              </div>
              
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              
              <!-- <div>
              <a href="admin.php" class="btn btn-block btn-primary text-uppercase">log out</a>
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
