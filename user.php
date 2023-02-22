<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>

 

 <?php 
//connexion et l'ajout
include("userbd.php") ;
  //update
if(isset($_POST['update'])){
$id= $_POST['id'];
  

$nom = $_POST["nom"];
$cin= $_POST["cin"];
$adresse= $_POST["adresse"];
$email= $_POST["email"];
$mp = $_POST["mp"];
$role = $_POST["role"];

// sql 
$con->query("update uuser SET nom='$nom ', cin='$cin' ,adresse= '$adresse ',email='$email' , password= '$mp',role='$role' WHERE id= '$id' ") or die('erreur update patient');
}

//supression
if(isset($_POST['supp']))
{
$id= $_POST['id_sup'];

$query = ("DELETE  FROM uuser  WHERE id= '$id' ") or die('erreur delete');
$con->query($query);

}
//sidbar
 include("accuiel.php") ;
 ?>

 
 
 
<!-- Modal edut -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">modification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="pd" action="#" method="POST">
     <div class="container">
       <div class="row">
            
       <input type="hidden" name="id" id="id"> 
         <div class="col-md-6">
           <label for="">nom* </label>
          <input name="nom"type="text" id="nom"class="form-control" required>
                   </div>
                   
         <div class="col-md-6">
            
           <label for="">cin *</label>
          <input type="text" name="cin"id="cin" class="form-control" required>
          
         </div>
         <div class="col-md-6">
         <label for="">adresse*</label>
          <input type="text" name="adresse" id="adresse" class="form-control" required>
         </div>
         <div class="col-md-6">
         <label for="">email *</label>
          <input type="text" name="email" id="email"class="form-control" required>
         </div>
         <div class="col-md-6">
         <label for="">mot de passe *</label>
          <input type="pasSword" name="mp"id="mp" class="form-control" required>
         </div>
         <div class="col-md-6">
         <label for="">Role *</label>
          <select name="role" id="role" class="form-control" required>
          <option value=""></option>
          <option value="user" > user</option>
          <option value="admin"> admin</option>


          </select>
          
         </div>
       </div>

         
       </div>
     
      </div>
      <div class="modal-footer">
        
        <button type="submit" value="update" name="update" class="btn btn-primary">Enregistré</button>
      </div>
    </form>
      </div>
     
    </div>
  </div>
</div>
<!-- Modal suppression  -->
 
<div class="modal fade" id="supmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">supression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  action="" method="POST">

     <div class="container">
       <div class="row">
       <input type="hidden" name="id_sup" id="id_sup">
    <h1> est ce que vous voullez supprimé ce User</h1>
       </div>
       </div>
     
       <div class="modal-footer">
        
         <button type="submit" value="supp" name="supp" class="btn btn-primary" >supprimé</button>
         
       </div>
     </form>
       </div>
     </div>
   </div>
 </div>

<!-- #########################################################################################################-->
<div class="full">
  <div class="home_content">
    <div class="text-center"><h1>User </h1></div>
   <!-- form user -->
   <form class="pd" action="" method="post">
     <div class="container">
       <div class="row">
        
         <div class="col-md-6">
           <label for="">nom* </label>
          <input name="nom"type="text" class="form-control" required>
                   </div>
                   
         <div class="col-md-6">
            
           <label for="">cin*</label>
          <input type="text" name="cin" class="form-control" required>
          
         </div>
         <div class="col-md-6">
         <label for="">adresse*</label>
          <input type="text" name="adresse" class="form-control" required>
         </div>
         <div class="col-md-6">
         <label for="">email *</label>
          <input type="text" name="email" class="form-control" required>
         </div>
         <div class="col-md-6">
         <label for="">mot de passe *</label>
          <input type="password" name="mp" class="form-control" required>
         </div>
         <div class="col-md-6">
         <label for="">Role *</label>
          <select name="role" id="" name="role" class="form-control" required>
          <option value=""></option>
          <option value="user"> user</option>
          <option value="admin"> admin</option>


          </select>
          
         </div>
       </div>

         
       </div>
       <br></br>
       <div class="row text-center">
       <div class="col-md-12 mb-4 pl-5">
         <button type="submit" name="ajouté" class="btn btn-danger">ajouté</button>
         </div>
       </div>
      </div>
    
    </form>
    <div class="container col-md-12">
    <table id="table" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nom</th>
      <th scope="col">cin</th>
      <th scope="col">adresse</th>
      <th scope="col">email</th>
   

      <th scope="col">role</th>

      <th scope="col">action</th>


    </tr>
  </thead>
  <tbody>
  <?php
    $sql=$con->query('select * from uuser');
    while($data=$sql->fetch_assoc()){
  ?>
    <tr>
      <td scope="row"><?php  echo $data['id'];?></td>
      <td><?php  echo $data['nom'];?></td>
      <td><?php  echo $data['cin'];?></td>
      <td><?php  echo $data['adresse'];?></td>
      <td><?php  echo $data['email'];?></td>
     
      <td><?php  echo $data['role'];?></td>

      <td><button type="button" class="btn btn-primary editbtn"  >modifié</button>
     <button  type="button" name="sup" class="btn btn-secondary supbtn">supprimé</button></a></td>
    </tr>
    <?php
     }
    ?>
  </tbody>
  </div>

 <script> 
 $(document).ready(function(){
$('.editbtn').on('click',function(){
  $('#editmodal').modal('show');
 $tr = $(this).closest('tr');
 var data =$tr.children("td").map(function(){

return $(this).text();
 }).get();

 console.log(data);

 $('#id').val(data[0]);
  var nom = $('#nom').val(data[1]);
  var cin = $('#cin').val(data[2]);
  var adresse= $('#adresse').val(data[3]);
 var email = $('#email').val(data[4]);
 
 $('#role').val(data[5]);

});

 });
 //transfer les infos à form modal suppression
 $(document).ready(function(){
$('.supbtn').on('click',function(){
  $('#supmodal').modal('show');
  $tr = $(this).closest('tr');
  var data =$tr.children("td").map(function(){

return $(this).text();
 }).get();

 console.log(data);

 $('#id_sup').val(data[0]);

});

});
 </script>
</body>
</html>