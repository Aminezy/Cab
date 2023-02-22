<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

// rdv
 if (isset($_POST["ajouté"])){
    $description = $_POST["description"];
    $date = $_POST["date"];
    $patient= $_POST["patient"];
    
    
    $sql = "INSERT INTO rdv  VALUES (default, '$description','$date',' $patient')";
    $con->query($sql);
 }

 
     ?>