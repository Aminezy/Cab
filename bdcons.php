<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
    

// cons
 if (isset($_POST["ajouté"])){
    
    $date = $_POST["date"];
    $description= $_POST["description"];
    $ordonnance= $_POST["ordonnance"];
    $patient= $_POST["patient"];

    
    
    $sql = "INSERT INTO consultaion VALUES (default, '$date','$description','$ordonnance','$patient')";
    $con->query($sql);
 }

 
     ?>