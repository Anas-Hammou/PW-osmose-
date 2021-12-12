<?php
    ob_start();
    if(!isset($_SESSION)){
        session_start();
    }
    if (!isset($_SESSION["username"]))
    {
        header('Location:login.php');
    }else 
    {
        if ($_SESSION["role_user"] == "Administrateur")
            header("Location:../BackViews/index.php") ;
        else
        {
require '../controller/evenementC.php';
require '../controller/participationC.php';
$evenementC = new evenementC();
$evenementC = new evenementC();
if(isset($_POST['tri'])) {
    $evenement = $evenementC->trievenement();
 }else {
    $evenement = $evenementC->afficherevenement();
 }
$participationC = new participationC;

?>

<!DOCTYPE html>
<html lang="fr">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> AIM </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="arti.css">
  <link rel="shoet icon" href="image/logo.png">
</head>

<body>
  <?php
require 'bar.php';
?>


  <header>
    <h1>AIM</h1>
    <h4>LE MEILLEUR SITE DE TECHNOLOGIE.</h4>

  </header>
  <form method="post" align=center>
<div class="text-center">
<form action="" method="POST">
    <input type="text" name="tri" hidden>
    <input type="submit" value="trier" class="btn btn-primary">
</div>
</form>
  <?php

                foreach ($evenement as $event) {
                    $list = $participationC->afficherparticipationbyevent($event['id']);
                    $nbr = count($list);
                    
    ?>
    <section class="main" id="evenement">

        <div class="content">
            <div class="card">
                <div class="left">
                    <h1><?php echo $event['titre']; ?></h1>
                    <p><?php echo $event['description'];?></p>
                    <br><?php echo $event['date_ajout'];?></br>
                    <h5><?php echo $event['auteur'];?></h5>
                    <br>
                    <h4>nombre de participants :<?php echo $nbr;?></h4>
                    <a href="participe.php?idev=<?php echo $event['id'];?>"><button class="primary-btn" >je participe</button></a>

                </div>
                <div align=center>
                <div class="right">
                    <img src="../uploads<?php echo $event['img'] ; ?>" alt="">
                </div>
            </div>
            </div>

    </section>
    <?php 
               }
        ?>
   
   

   

    <video src="image/5G.mp4" width=1520  height=540 controls poster="vignette.jpg">
        Cette vidéo ne peut être affichée sur votre navigateur Internet.<br>
        Une version est disponible en téléchargement sous <a href="https://www.youtube.com/watch?v=iQeaK0NGMnAL">adresse du lien </a> . 
      </video>
      
      
   
    <footer>

    
        <h1>Nos services</h1>
        <div class="services">
            
            <div class="service">
               
                <p>Découvrez nos services en ligne complets .</p>
            </div>
            <br>

            <div class="service">
                <h3>Paiement en ligne</h3>
                <p>Découvrez les méthodes faciles de Paiement en ligne ( paiment banquaire ).</p>
            </div>

            
        </div>

        <p id="contact">Contact : telephone: +216 70 000 111 | Facebook/Instagram:  AIM | Gmail: AIM.ESPRIT@gmail.com | &copy; 2021, AIM.</p>
    </footer>
</body>
</html>
<?php } }
    ob_end_flush();
    ?>