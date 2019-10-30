<?php
include '../class/ConnexionBD.php';
/**
     * Méthode qui permet de selectionner tous les informations d'une table.
     */
class Requette {
    public Function SelectAll($nomtable){
        global $bdd;   
        $sql = "SELECT * FROM $nomtable";
        $d = [];
        $res = $bdd->query($sql);
        
        if($res->rowCount() > 0){
            while($ligne = $res->fetch()){
                $d []= $ligne;
            }
        }
        return $d;
    }
    
/**
     * Méthode qui permet d'ajouter des informations dans une table de la base de données.
     */

    public function insert($nomtable,$cle,$valeur){
        global $bdd;
        $sql = "INSERT INTO $nomtable ($cle) VALUES ('$valeur')";
        $bdd->query($sql);
        
        // $req = $bdd->query($sql)->prepare($sql);

        
    }
    
    // * supprimer des données.
    public function Supprimer($id,$nomtable,$cle){
        global $bdd;
        $sql = "DELETE FROM $nomtable WHERE $cle=$id";
        $bdd->query($sql);
    }


}

?>
