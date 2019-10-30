<?php
include '_inc.php';
include_once '../class/Requette.php';


$req = new Requette(); 
$id=$_GET['id_specialite'];
$nomtable= 'specialite';
 $cle='id_specialite';                   
$res = $req-> Supprimer($id,$nomtable,$cle);
header("location: listerspecialite.php"); 