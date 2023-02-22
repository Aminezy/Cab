<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

//patient
 if (isset($_POST["ajouté"])){
    $nom = $_POST["nom"];
    $adresse= $_POST["adresse"];
    $tel= $_POST["tel"];
  
    $sql = "INSERT INTO patient VALUES (default, '$nom','$adresse',' $tel')";
    $con->query($sql);
 }
 ?>

 
