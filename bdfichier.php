<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

// fichier
 if (isset($_POST["ajouté"])){
    
    $nom = $_POST["nom"];
    $patient= $_POST["patient"];

    
    
    $sql = "INSERT INTO fichier VALUES (default, '$nom','$patient')";
    $con->query($sql);
 }

 
     ?>