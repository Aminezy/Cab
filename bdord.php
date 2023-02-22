<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

// ordonnance
 if (isset($_POST["ajouté"])){
    
    $nom = $_POST["nom"];
    $description= $_POST["description"];
    
    
    $sql = "INSERT INTO ordonnnace  VALUES (default, '$nom','$description')";
    $con->query($sql);
 }

 
     ?>