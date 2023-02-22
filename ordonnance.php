<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body> 
<!-- conx et 'ajout -->
<?php include("bdord.php");
  //update
  if(isset($_POST['update'])){
    $id= $_POST['id'];
      
    $nom = $_POST['nom'];
    $description= $_POST['description'];
    
    
    // sql 
    $con->query("update ordonnnace SET  nom='$nom ',	description= '$description' WHERE id= '$id' " ) or die('erreur update patient');
    }
    
    //supression
    if(isset($_POST['supp']))
    {
    $id= $_POST['id_sup'];
    
    $query = ("DELETE  FROM  ordonnnace WHERE id= '$id' ") or die('erreur delete');
    $con->query($query);
    
    }
 include("accuiel.php");?>

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
    <h1> est ce que vous voullez supprimé cette ordonnnace</h1>
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
<!-- Modal edit  -->
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
      <form class="pd" action="" method="post">
     <div class="container">
       <div class="row">
       <input type="hidden" name="id" id="id">
         <div class="col-md-6">
           <label for=""><p> nom * </p> </label>
           <input type="text"id="nom"name="nom" class="form-control" required >
         </div>
       </div>
       
       <div class="row">
         <div class="col-md-6">
          
          </div>
          
        
       </div>
      
                <div class="form-group">
                    <label for="form_message">description*</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Description *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
       <div class="row ">
         
       </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermé</button>
        <button type="submit" name="update" value="update" class="btn btn-primary">Enregistré</button>
      </div>
    </form>
</div>
     
    </div>
  </div>
</div>




  <div class="home_content">
    <div class="text-center"><h1>Ordonnance</h1></div>

   <!-- form  -->
   <form class="pd" action="" method="post">
     <div class="container">
       <div class="row">
        
         <div class="col-md-6">
           <label for=""><p> nom * </p> </label>
           <input type="text"id="nom"name="nom" class="form-control" required >
         </div>
       </div>
       
       <div class="row">
         <div class="col-md-6">
          
          </div>
          
        
       </div>
      
                <div class="form-group">
                    <label for="form_message">description*</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Description *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <br>
       <div class="row ">
         
       </div>
       <div class="row">
       <div class="col-md-12 pl-5 mb-4 text-center">
         <button type="submit"  name="ajouté" class="btn btn-danger">ajouté</button>
         </div>
       </div>
      </div>
    
    </form>
    <div class="container col-md-12">
    <table id="table"class="table table-bordered">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">nom</th>

      <th scope="col">description</th>
      <th scope="col">action</th>


    </tr>
  </thead>
  <tbody>
  <?php
    $sql=$con->query('select * from ordonnnace' );
    while($data=$sql->fetch_assoc()){
  ?>
    <tr>
      <td scope="row"><?php  echo $data['id'];?></td>
      <td><?php  echo $data['nom'];?></td>
      <td><?php  echo $data['description'];?></td>
     
      <td><button type="button" class="btn btn-primary editbtn">modifié</button>
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
 $('#nom').val(data[1]);
 $('#description').val(data[2]);
;
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
