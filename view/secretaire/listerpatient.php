<?php
include '_inc.php';
include_once '../class/Requette.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>sécrétaire</title>
  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link type="text/css" rel="stylesheet" href="../../css/listerpatient.css">
</head>

<body id="page-top">

  <!-- Navigation -->
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
            <a class="nav-link js-scroll-trigger" href="">FIXER RENDEZ-VOUS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">LISTER RENDEZ-VOUS</a>
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
<div class="tableau">
  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Id Patient</th>
      <th scope="col">numero_dossier</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Date de Naissance</th>
      <th scope="col">Adresse</th>
      <th scope="col">TEL</th>
      <th scope="col">CNI</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
      $req = new Requette();   
      $res = $req->SelectAll('patient');
      foreach ($res as $value) {
        echo "<tr>";
        echo  "<td>".$value['id_patient']."</td>";
        echo  "<td>".$value['numero_dossier']."</td>";
        echo  "<td>".$value['nom_patient']."</td>";
        echo  "<td>".$value['prenom_patient']."</td>";
        echo  "<td>".$value['date_de_naissance']."</td>";
        echo  "<td>".$value['adresse']."</td>";
        echo  "<td>".$value['tel']."</td>";
        echo  "<td>".$value['cni']."</td>";
        echo "<td><a class=\"edit\" href=\"modifierpatient.php?id_patient=$value[id_patient]\">Modifier</a> | <a class=\"edit\" href=\"supprimerpatient.php?id_patient=$value[id_patient]\">Supprimer</a> </td>";
        echo "</tr>";
      }
    ?>
     
    
  </tbody>
</table>
</div>
 <!---fin header---->
 
  <!-- Footer -->
  <footer class="bg-light py-1">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - athieka93@gmail.com</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>
