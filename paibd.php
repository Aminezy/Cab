<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

// paiment
 if (isset($_POST["ajouté"])){
     $date = $_POST["date"];
     $montant= $_POST["montant"];
     $mp= $_POST["mp"];
     $consultation= $_POST["consultation"];
  
    

    
    
    $sql = "INSERT INTO paiement VALUES(default,'$montant', '$mp','$date','$consultation')";
    // die($sql);
    $con->query($sql);
 }

 
     ?>