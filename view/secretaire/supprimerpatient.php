<?php
include '_inc.php';
include_once '../class/Requette.php';


$req = new Requette(); 
$id=$_GET['id_patient'];
$nomtable= 'patient';
 $cle='id_patient';                   
$res = $req-> Supprimer($id,$nomtable,$cle,);
header("location: listerpatient.php"); 