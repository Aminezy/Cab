<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

// médicaments 
 if (isset($_POST["ajouté"])){
    
    $nom = $_POST["nom"];
    $description= $_POST["description"];
    
    
    $sql = "INSERT INTO médicaments  VALUES (default, '$nom','$description')";
    $con->query($sql);
 }

 
     ?>