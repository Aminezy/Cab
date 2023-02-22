<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

// user
 if (isset($_POST["ajouté"])){
    $nom = $_POST["nom"];
    $cin= $_POST["cin"];
    $adresse= $_POST["adresse"];
    $email= $_POST["email"];
    $mp = $_POST["mp"];
    $role = $_POST["role"];

    $sql = "INSERT INTO uuser VALUES (default, '$nom','$cin','$adresse','$email','$mp','$role')";
    $con->query($sql);
 }
 


?>