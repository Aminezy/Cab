<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

//detail ordonnacnce
 if (isset($_POST["ajouté"])){
    
    $nbr = $_POST["nbr"];
    $nbrjrs= $_POST["njours"];
    $ordonnance= $_POST["ordonnance"];
    $médicaments= $_POST["médicaments"];

    
    
    $sql = "INSERT INTO detail_ordonnance VALUES (default, '$nbr','$nbrjrs','$ordonnance','$médicaments')";
    $con->query($sql);
 }

 
     ?>