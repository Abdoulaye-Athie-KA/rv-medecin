<?php
//class ConnexionBD{
    //public function connect(){
        $servername = "localhost";
        $dbname = 'rv_medecin';
        $username = "athie";
        $pass = "ka123@§";
       /***$encodage = 'utf8';****/

        try{
            $bdd= new PDO("mysql:host=$servername;dbname=$dbname", $username,$pass,[PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
            // $bdd->setAttributhttp://localhost/rv_medecin/index.phpe(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //return $bdd;
        }
        catch(PDOException $e){
            //return null;
            die ("Impossible de se connecter à la base de données:");
        }
    //}
//}
