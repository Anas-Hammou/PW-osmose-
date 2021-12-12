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
   require_once '../controller/formationC.php';
$articleC = new formationC();

    $articleS = $articleC->afficherformation();
    require_once '../controller/commandeC.php';

    $commandeC = new commandeC();
    $commandeS = $commandeC->affichercommande();
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
      <br>
      <br>
      <br>
      <br> 



      <body>
        
        
      <table align="center">
<tr>    <td>   <h1>Mes Achats</h1></td>
</tr></table>


<br> <br>  <br> <br> 
<div class="cards1">
<?php 
               $somme =0;
              /* foreach($articleS as $article) {
                    //getarticlebyID
                   // $article = $commandeC->CgetarticlebyID($commande['ID_OFFRE']);
                   */
                    $id_user = $_SESSION["id_user"];
                   foreach($commandeS as $commande) {
                       $article = $commandeC->CgetformationbyID($commande['ID_OFFRE']);
                     //  var_dump($article);
                       if ($id_user == $commande['ID_CLIENT']) {
                          $somme += $article['prix'];
           
        ?>



    <div class="card1">
    
      <img src="C:\xampp\htdocs\FORMATIONnn\view\1.jpg" alt="" style="width:400">
      <div class="card-header">
          <table align="right">
        <tr>    <td><a href="supprimer_commande.php?id=<?php echo $commande['ID_Commande'];?>"><img src="image/supp.png" witdh='25px' height='25px'></a></td>
          
        </tr>
      </table>
          <br>
        <h4 class="title"><?php echo $article['titre'];?></h4>
        <h4 class="price"><?php echo $article['prix'];?>TND</h4>
     <!-- </div>
      <div class="card-body">-->
      <h4 class="description"><?php echo $article['description'];?></h4>
      
      <h4 class="participants">nombre de participants : <?php echo $article['participants'];?></h4>
      <p>par <?php echo (substr($article['formateur'], 0, 200)); ?></p><br><br>
      
      </div>
      <br> <br> <br>
      <?php 
    }
}
    ?>  
      </div> 
      <br>
      <br>
    <table><tr>
    <td><h4><?php echo $somme ?> TND</h4></td>
    <td><a href="confsupr.php?prix=<?php echo $somme;?>"><button type="button" class="btn btn-dark">acheter tous</button></a></td></tr>
    </table>
    <table align="right">
    </table>
</tr>
</table>

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
