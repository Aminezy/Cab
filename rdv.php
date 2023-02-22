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
include("rdvbd.php") ;
  //update
if(isset($_POST['update'])){
$id= $_POST['id'];;
  
$description= $_POST['description'];
$date= $_POST['date'];
$patient= $_POST['patient'];

// sql 
$con->query("update rdv SET  description='$description', date= '$date', id_patient='$patient' WHERE id= $id " ) or die('erreur update patient');
}

//supression
if(isset($_POST['supp']))
{
$id= $_POST['id_sup'];

$query = ("DELETE  FROM rdv  WHERE id= '$id' ") or die('erreur delete');
$con->query($query);

}
//sidbar
 include("accuiel.php") ;
 ?>

<!-- Modal mod -->
<!-- Modal editt -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="pd" action="" method="POST">
     <div class="container">
       <div class="row">
       <input type="hidden" name="id" id="id">
       <div class="form-group">
                    <label for="form_message">description*</label>
                    <textarea id="description" name="description" class="form-control" placeholder=" description *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
       <div class="row">
         <div class="col-md-6">
           <label for="">date *</label>
           <input type="date" name="date" id="date" class="form-control" required>
           
          </div>
          <div class="col-md-6">
           <label for="">patient *</label>
           <select id="patient" name="patient" class="form-control" required >
                        <?php 
                          $sql=$con->query('select * from patient');
                          while($dt=$sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $dt['id'];?>"><?php echo $dt['nom'];?></option>>
                        <?php
                          }
                        ?>
                    </select>
         </div> 

         </div>
       </div>
      
       <br> </br>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button>
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
    <h1> est ce que vous voullez supprimé ce RDV</h1>
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
<!-- ##########################################################################################################################"" -->

  <div class="home_content">
    <div class="text-center">  <h1> Rendez-vous</h1></div>
   
   <!-- form  -->
   <form class="pd" action="" method="POST">
     <div class="container">
       <div class="row">
       <div class="form-group">
                    <label for="form_message">description*</label>
                    <textarea id="description" name="description" class="form-control" placeholder=" description *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
       <div class="row">
         <div class="col-md-6">
           <label for="">date *</label>
           <input type="date" name="date"id="date" class="form-control" required>
           
          </div>
          <div class="col-md-6">
           <label for="">patient *</label>
           <select id="patient" name="patient" class="form-control" required >
                        <?php 
                          $sql=$con->query('select * from patient');
                          while($dt=$sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $dt['id'];?>"><?php echo $dt['nom'];?></option>>
                        <?php
                          }
                        ?>
                    </select>
         </div> 
       </div>
       
    
      
         </div>
       </div>
       <div class="row ">
         
       </div>
       <br> </br>
       <div class="row">
       <div class="col-md-12 mb-4 pl-5 text-center">
         <button type="submit"  name="ajouté" class="btn btn-danger">ajouté</button>
         </div>
       </div>
      </div>
    
    </form>
    <div class="container col-md-12">
    <table id="table" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
    
      <th scope="col">description</th>
      <th scope="col">date</th>
      <th scope="col">patient</th>
      <th scope="col">action</th>


    </tr>
  </thead>
  <tbody>
  <?php
    $sql=$con->query('select * from  rdv');
    while($data=$sql->fetch_assoc()){
  ?>
    <tr>
      <td scope="row"><?php  echo $data['id'];?></td>
      <td><?php  echo $data['description'];?></td>
      <td><?php  echo $data['date'];?></td>
      <td><?php  echo $data['id_patient'];?></td>
      <td><button type="button" class="btn btn-primary editbtn" >modifié</button>
      <button type="button" class="btn btn-secondary supbtn">supprimé</button></td>
    </tr>
    <?php
     }
    ?>
  </tbody>
 </div>
 <script> 
//transfer les infos à form modal update
$(document).ready(function(){
$('.editbtn').on('click',function(){
  $('#editmodal').modal('show');
  
 $tr = $(this).closest('tr');
 var data =$tr.children("td").map(function(){

return $(this).text();
 }).get();

 console.log(data);

 $('#id').val(data[0]);
 $('#description').val(data[1]);
 $('#date').val(data[2]);
 $('#id_patient').val(data[3]);
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