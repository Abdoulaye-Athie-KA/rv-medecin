<?php
include '_inc.php';
include_once '../class/Requette.php';


$req = new Requette(); 
$id=$_GET['id_service'];
$nomtable= 'service';
 $cle='id_service';                   
$res = $req-> Supprimer($id,$nomtable,$cle);
header("location: listerservice.php"); 