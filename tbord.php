

<?php include("accuiel.php") ?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php
//connextion
$user ='localhost';
$username = 'root';
$mp = '';
$shéma = 'cab';
$con = mysqli_connect("$user","$username","$mp","$shéma") or die('erreur cnx'); 
$jours = date("Y-m-d");
            //TOTAL Patient
            $totalpatient = "SELECT * FROM Patient";
            $Exute = $con-> query( $totalpatient);
            $totalP = mysqli_num_rows($Exute);
            //TOTAL Paiement
            $totalPai = "SELECT SUM(montant) as 'total'  FROM   paiement";
            $Exut = $con-> query($totalPai)->fetch_assoc();
          
              //TOTAL consultation
              $totalcons = "SELECT * FROM consultaion";
              $Exute = $con-> query( $totalcons);
              $totalc = mysqli_num_rows($Exute);
                //TOTAL user
            $totalus = "SELECT * FROM uuser";
            $Exute = $con-> query(  $totalus);
            $totaluser = mysqli_num_rows($Exute);
               //TOTAL rdv
               $totalrd= "SELECT * FROM rdv";
               $Exute = $con-> query($totalrd);
               $totalrdv = mysqli_num_rows($Exute);
               
                    //TOTAL med
               $totalme= "SELECT * FROM médicaments";
               $Exute = $con-> query($totalme);
               $totalmed = mysqli_num_rows($Exute);
                //TOTAL detail ordonnace
                $totalme= "SELECT * FROM detail_ordonnance";
                $Exute = $con-> query($totalme);
                $totaldet = mysqli_num_rows($Exute);
                //TOTAL ordonnance
                $totalme= "SELECT * FROM ordonnnace";
                $Exute = $con-> query($totalme);
                $totalordo = mysqli_num_rows($Exute);


                $especes=$con->query("SELECT count(*)  AS somme FROM paiement  where mode_de_paiement='en especes' "); $data=$especes->fetch_assoc();
                $cheque=$con->query("SELECT count(*)  AS somme FROM paiement  where mode_de_paiement='check bancaire' "); $data1=$cheque->fetch_assoc();
                $carte=$con->query("SELECT count(*)  AS somme FROM paiement  where mode_de_paiement='carte bancaire' "); $data2=$carte->fetch_assoc();
                $total=$con->query("SELECT count(*)  AS somme FROM paiement "); $data3=$total->fetch_assoc();

                $pourcentage_especes=$data['somme'] / $data3['somme'] * 100  ;
                $pourcentage_cheque=$data1['somme'] / $data3['somme'] * 100 ;
                $pourcentage_carte=$data2['somme'] / $data3['somme'] * 100;





?>
<div class="home_content">
    <div class="text-center mb-4"><h1>TABLEAU DU BORD  </h1>
    <h5> c'est le <?php  echo("$jours ");?>  </h5></div>
<!-- grid -->
 
<div class="container">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
    <div class="col shadow p-3 mb-5 bg-body rounded">
      <!-- consultation -->
     


      <i class="fa fa-comments-o "></i>             

      <h5><?php echo $totalc ;  ?>  consultation(s)</h5>
      <a href="consultation.php"><button type="button" class="btn btn-info"> infos consultation   </button></a>
      </div>
<div class="col shadow p-3 mb-5 bg-body rounded">
<i class="fa fa-male"></i>
<h5><?php echo $totalP ;  ?>  patient(s)</h5>
<a href="patient.php"><button type="button" class="btn btn-info"> infos patient   </button></a>
</div>

<!--  paiement-->
    <div class="col shadow p-3 mb-5 bg-body rounded"><i class="fa fa-credit-card"></i>
    
<h5><?php echo $Exut['total'] ; ?>  MAD</h5>
<a href="paiment.php"><button type="button" class="btn btn-info"> infos paiement   </button></a>
</div>
<!-- user -->

    <div class="col shadow p-4 mb-5 bg-body rounded"><i class="fa fa-user "></i>
    
    <div> <h5><?php echo $totaluser ; ?> USER(s)  </h5> 
    <a href="user.php"><button type="button" class="btn btn-info"> infos user   </button></a>
 
    </div>
  </div>
</div>
<!-- ################################################### -->
<div class="container">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
    <div class="col shadow p-3 mb-5 bg-body rounded">
      <!--rendez-vous -->
  
      <i class="fa fa-calendar"></i>             

      <h5><?php echo $totalrdv ;  ?>  Rendez-vous</h5>
      <a href="rdv.php"><button type="button" class="btn btn-info"> infos RDV </button></a>
      </div>
    <!-- ordonnance -->
<div class="col shadow p-3 mb-5 bg-body rounded">
<i class="fa fa-sort"></i>
<h5><?php echo $totalordo ;  ?>  ordonnance(s)</h5>
<a href="ordonnance.php"><button type="button" class="btn btn-info"> infos ordonnance</button></a>
</div>

<!-- medicament-->
    <div class="col shadow p-3 mb-5 bg-body rounded"><i class="fa fa-medkit"></i>
    
<h5><?php echo $totalmed; ?>  medicaments </h5>
<a href="médicaments.php"><button type="button" class="btn btn-info"> infos médicament  </button></a>
</div>
<!-- detail ordonnace -->

    <div class="col shadow p-4 mb-5 bg-body rounded"><i class="fa fa-info-circle"></i>
    
    <div> <h5><?php echo  $totaldet ; ?> detail ordonnance   </h5> 
    <a href=" detail ordonnance.php"><button type="button" class="btn btn-info"> infos detail ordonnance  </button></a>
 
    </div>
  </div>
</div>
<div class="statistiques">
<!-- statistique 1-->
<div class="row">
    <div class="col-6">
      <h2 class="text-center"> mode de Paiement</h2>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["En especes ", "check bancaire", "carte bancaire"];
var yValues = [<?php echo $pourcentage_especes;?>, <?php echo  $pourcentage_cheque; ?>, <?php echo $pourcentage_carte;?>];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text : "les pourcentages en %"
    }
  }
});
</script>
 <!-- statistiques2  rdv-->



    </div>
    <div class="col-6"> <h2 class="text-center mb-4"> liste du rendez-vous  </h2>
  
    <table id="table" class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
    
      <th scope="col">description</th>
      <th scope="col">date</th>
      <th scope="col">patient</th>
     


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
     
    </tr>
    <?php
     }
    ?>
  </tbody>
  </div>
    
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>