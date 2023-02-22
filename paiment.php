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

<?php include("paibd.php");
//update
if(isset($_POST['update'])){
  $id= $_POST['id'];
    
  $montant = $_POST['montant'];
  $mdp= $_POST['mdp'];
  $date= $_POST['date'];
  $consultation =$_POST['consultation'];
  // sql 
  $con->query("update paiement SET  montant='$montant',mode_de_paiement= '$mdp ', date='$date',id_consultation='$consultation' WHERE id= '$id' " ) or die('erreur update patient');
  }
  
  //supression
  if(isset($_POST['supp']))
  {
  $id= $_POST['id_sup'];
  
  $query = ("DELETE  FROM paiement  WHERE id= '$id' ") or die('erreur delete');
  $con->query($query);
  
  }
  //sidbar
   include("accuiel.php") ;
   ?>

       

<!-- Modal  supp-->

 
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
    <h1> est ce que vous voullez supprimé ce paiement</h1>
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
<!-- Modal modification -->
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
      <form  action="" method="POST">
     <div class="container">
       <div class="row">
        <input type="hidden" name="id" id="id">
         <div class="col-md-6">
           <label for="">montant* </label>
          <input class="form-control"id="montant" name="montant" type="text" required>
                   </div>
        
         <div class="col-md-6">
         <label for="">mode de paiement *</label>
          <select  id="mdp" name="mdp" class="form-control" required>
          <option value=""></option>
          <option value="carte bancaire"> carte bancaire</option>
          <option value="en especes"> en especes</option>
          <option value="check bancaire"> check bancaire</option>



          </select>
         </div>
         <div class="col-md-6">
         <label for="">date*</label>
           <input type="date" name="date"id="date" class="form-control" required>
          
           <div class="col-md-6">
           <label for="">consultation* </label>
           <select id="consultation" name="consultation" class="form-control" required >
                        <?php 
                          $sql=$con->query('select * from consultaion');
                          while($dt=$sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $dt['id'];?>"><?php echo $dt['description'];?></option>>
                        <?php
                          }
                        ?>
                    </select> 

</div>
          </div>
        </div>
 
          
        </div>
      
       </div>
     
       <div class="modal-footer">
         
         <button type="submit" value="update" name="update" class="btn btn-primary">Enregistré </button>
         
       </div>
     </form>
       </div>
     </div>
   </div>
 </div>
  <div class="home_content">
    <div class="text-center">  <h1>Paiement</h1></div>
 
   <!-- form  -->
   <form class="pd" action="" method="post">
     <div class="container">
       <div class="row">
       
                <div class="row">
         <div class="col-md-6">
           <label for="">montant *</label>
           <input type="number" name="montant"id="montant" class="form-control" required>
           
          </div>
          <div class="col-md-6">
         <label for="">mode de paiement *</label>
          <select  id="mp" name="mp" class="form-control" required>
          <option value=""></option>
          <option value="carte bancaire"> carte bancaire</option>
          <option value="en especes"> en especes</option>
          <option value="check bancaire"> check bancaire</option>



          </select>
         </div>
       <div class="row">
         <div class="col-md-6">
           <label for="">date *</label>
           <input type="date" name="date"id="date" class="form-control" required>
           
          </div>
        


         <div class="col-md-6">
           <label for="">consultation* </label>
           <select id="consultation" name="consultation" class="form-control" required >
                        <?php 
                          $sql=$con->query('select * from consultaion');
                          while($dt=$sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $dt['id'];?>"><?php echo $dt['description'];?></option>>
                        <?php
                          }
                        ?>
                    </select> 
                   </div>
         </div>
       </div>
      <br>
       
       <div class="row">
       <div class="col-md-12 pl-5 mt-4 mb-4 text-center" >
         <button type="submit" name="ajouté" class="btn btn-danger " >ajouté</button>
</div>
       </div>
      </div>
    
    </form>
    <div class="container col-md-12">
    <table id="table" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
    
      <th scope="col">montant (MAD)</th>
      <th scope="col">mode de paiement</th>

      <th scope="col">date</th>
      <th scope="col">consultation</th>
      <th scope="col">action</th>


    </tr>
  </thead>
  <tbody>
  <?php
    $sql=$con->query('select * from  paiement');
    while($data=$sql->fetch_assoc()){
  ?>
    <tr>
      <td scope="row"><?php  echo $data['id'];?></td>
      
      <td><?php  echo $data['montant'];?></td>
      <td><?php  echo $data['mode_de_paiement'];?></td>

      <td><?php  echo $data['date'];?></td>
      <td><?php  echo $data['id_consultation'];?></td>

      
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
 $('#montant').val(data[1]);
 $('#mdp').val(data[2]);
 $('#date').val(data[3]);
 $('#consultation').val(data[4]);


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