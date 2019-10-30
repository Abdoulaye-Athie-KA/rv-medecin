<?php

class Form {

public function input($type, $name, $label, $value){
            return "<div class='form-label-group'>
                <input name='$name' type='$type' value='$value' id='input$name' class='form-control' placeholder='$label' required autofocus>
                <label for='input$name'>$label</label>
              </div>";

}
public function select($name, $label, $options){
  return "
  <label for=\"input$name\">$label</label>
  <div class='form-label-group'>
      <select name='$name' id='input$name' class='form-control'>
        $options
      </select>
    </div>";
  }
/*******public function select($name, $label, $options){
    $options_html="";
    foreach($options as $k=> $v){
        $options_html = $options_html . "<option value='".$k."'>$v</option>";
    }
    
            return "
            <label for=\"input$name\">$label</label>
            <div class='form-label-group'>
                <select name='$name' id='input$name' class='form-control'>
                  $options_html
                </select>
              </div>";
  
}*********/


public function submit($label){

    return '<button type="submit" name="submit" class="btn btn-primary">' .$label. '</button>';   
}



// public function insert($fields,$nomtable){
//   $cle = implode(',',array_keys($fields));
//   $valeur = implode(", :",array_keys($fields));

//   $sql= "INSERT INTO $nomtable ($cle) VALUES(:".$valeur.")";
//   $res = $this->connect()->prepare($sql);
   
//   foreach($fields as $key => $valeur){
//       $res->binvalue(':'.$key,$value);
//   }
//   $result = $res->execute();
      
//           return $result;
// }

// public function insert($service){
//   $sql= "INSERT INTO service (nom_service) VALUES($service)";
//   $res = $this->connect()->query($sql);
//       if($res->rowCount() > 0){
//           return $res->fetch();
//       }


// }
// public function SelectAll(){
//   $sql= "SELECT * FROM employer";
//   $d = [];
//   $res = $bdd->query($sql);
//   if($res->rowCount()>0){
//     while($ligne = $res->fetch()){
//       $use[]=$ligne;
//     }
//     return $use;
//   }
  
// }

}