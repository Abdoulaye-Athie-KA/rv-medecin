<?php
require_once 'view/class/ConnexionBD.php';

  // require_once 'view/class/Form.php';
include '_inc.php';
  
include 'view/class/Requette.php'; 

if(isset($_POST['submit'])){
  extract($_POST);
  
 
  if(!empty($email) || !empty($mdp)){
   
    $utilisateur = new Requette();
   
    $lg = $utilisateur->SelectAll("employer");
   
    $ok=0;
    foreach($lg as $el){
      $ok = 1;
      if($email==$el['email'] && $mdp==$el['mot_de_pass']){
        if($el['id_fonction']==1){
          header('location:view/admin/admin.php');
        }else if($el['id_fonction']==2){
          header('location:view/medecin/medecin.php'); 
        }else if($el['id_fonction']==3){
          header('location:view/secretaire/secretaire.php');
        }
      }
    }
  }
  if($ok==1){
    echo "<script>alert('DONNÉS INVALIDE |||')</script>";
  }else{
    echo "<script>alert('veuillez renseigner tous les champs')</script>";
  }
}
?>

<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
   <!----- <link type="text/css" rel="stylesheet" href="boostrap/css/bootstrap.min.css">---->
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Accueil Hopital</title>
</head>
<body>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">BIENVENUE!</h3>
              <form method="POST" action="">

              <label for="inputEmail">Email address</label>
                <div class="form-label-group">
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                </div>
                <label for="inputPassword">password</label>
                <div class="form-label-group">
                  <input type="password" name="mdp" id="inputPassword" class="form-control" placeholder="Password" required>  
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" name="submit" type="submit">Valider</button>
                <div class="text-center">
                  <a class="small" href="#">Forgot password?</a></div>
              </form>
            </div>
          </div>
          
          <?php
		    	// if(isset($_SESSION['message'])){
		    		?>
		    			<!-- <div class="alert alert-info text-center">
                  < <?php 
                  // echo $_SESSION['message']; 
                  ?> -->
					    <!-- </div>  -->
		    		<?php
 
		    		// unset($_SESSION['message']);
		    	// }
		    ?>

        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>