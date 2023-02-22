
<?php 
session_start();

//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx');
if(isset($_POST['Connexion'])){
	// die();

	$email=$_POST['email'];
	$mp=$_POST['mp'];
	$user= $con->query("select * from uuser where  email='".$email."' and password = '".$mp."'"); 


	$log = $user->fetch_assoc();
	if ($log['email'] != '') {
		$mp = $log["password"];
		$_SESSION['email']=$log['email'];
		if ($log['role'] ==="user") {
			header('location:rdv.php');
			
		}else{
		header('location:tbord.php');
	}
		
	}else{
		header('location:connexion.php');
		
	}
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>

	<title>cab Amine </title> 
	<link rel="shortcut icon" href="../img/logo0.jpg">
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>connexion</h3>
				
			<div class="card-body">
				<form action="" method="POST" >
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="" class="form-control" onkeyup="validation();" name="email" id="email" placeholder="utilisateur " required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="mp" id="mp" class="form-control" placeholder="mot de passe" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" required>je ne suis pas un robot 
					</div>
					<div class="form-group">
						<input type="submit" onclick="validation();" name="Connexion" value="Connexion" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				
				<div class="d-flex justify-content-center">
					<a href="navbar.php"> tu as oublié votre not de passe?  pourriz-vous contactez nous .</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="JS/validation.js">

</script>

</body>
</html>