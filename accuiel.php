<?php
session_start();
if (($_SESSION['email']=="")) {
	header('location:connexion.php');
}
if (isset($_POST['logout'])) {
       $_SESSION['email']='';
       session_unset();
       header('location:connexion.php');
}


?>
<!DOCTYPE html><html class="menu">
<html>

<head>

<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="google" value="notranslate"/>
<title>cab Amine</title>
<link rel="shortcut icon" href="../img/logo0.jpg">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="shortcut icon" href="./img/logo0.jpg">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body>



<nav class="main-menu" style="position: fixed !important;">
<?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
        $sql = "SELECT * from uuser where email='".$_SESSION['email']."' ";
        $exute = $con->query($sql);
        $tbord=$exute -> fetch_assoc();


        if ( $tbord['role']==="admin") {
       



?>

<li class="my-2">                                   
<a href="tbord.php">
<i class="fa fa-tachometer"></i>
<span class="nav-text">tableau du bord</span>
</a>
</li> 

 
<li class="my-2">                                 
<a href="medcin.php">
<i class="fa fa-user-md "></i>
<span class="nav-text">medcin</span>
</a>
</li>   
<li class="darkerli my-2">
<a href="paiment.php">
<i class="fa fa-credit-card"></i>
 <span class="nav-text">paiement</span>
</a>
</li>
<li class="my-2">                                 
<a href="user.php">
<i class="fa fa-user "></i>
<span class="nav-text">User</span>
</a>
</li>   
<?php  } ?>
    
<li class="my-2">                                 
<a href="rdv.php">
<i class="fa fa-calendar "></i>
<span class="nav-text">Rendez-vous</span>
</a>
</li>   
  


 
<li class="my-2">
<a href="patient.php">
<i class="fa fa-male"></i>
<span class="nav-text">Patient</span>                      
 
</a> 
</li>
<li class="darkerlishadow my-2">
<a href="consultation.php">
<i class="fa fa-comments-o "></i>
<span class="nav-text">consultation</span>
</a>
</li>
  
<li class="darkerli my-2">
<a href="detail ordonnance.php">
<i class="fa fa-info-circle"></i>
<span class="nav-text">detail ordonnance</span>
</a>
</li>
  
<li class="darkerli my-2">
<a href="médicaments.php">
<i class="fa fa-medkit "></i>
<span class="nav-text">médicaments</span>
</a>
</li>
  
<li class="darkerli my-2">
<a href="ordonnance.php">
<i class="fa fa-sort"></i>
 <span class="nav-text">ordonnance</span>
</a>
</li>

<li class="darkerli my-2">
<a href="fichier.php">
<i class="fa fa-file"></i>
 <span class="nav-text">fichier</span>
</a>
</li>

<form action="" method="post">
<li class="darkerli my-2">

<i class="fa fa-outdent my-3"></i>
<button type="submit" name="logout"><span class="nav-text">Sortir</span></button>
</a>
</form>
</li>

        </nav>
  
  
</body>
</html>