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
      <br> <br> <br> 

      <table align="center">
        <tr>    <td> 
        <form action="recu.php" method="POST" >
          <input name="ID_ACHAT" value="<?php echo rand(1,10000);?>" hidden>
          <input name="TITRE" value="<?php echo 'achat de '.$_GET['prix'].' dinars';?>" hidden>
          <input name="ID_COMMANDE" value="0" hidden>
          <input name="PRIX" value="<?php echo $_GET['prix'];?>" hidden>
          <label for="COMPTE_CB"><p style="color:black">compte cb:</p></label>
          <input type="text" name="COMPTE_CB" required>
        <input type="submit" class="btn btn-dark" value="Confirmer l'achat">
          </td>
          
        </tr>
      </table>
      <table align="center">
      <tr><br> <br></tr>
         <tr>
          
          <td> <a href="panier.php" ><button3 type="button" class="btn btn-dark">Supprimer l'achat</button3> </a>  </td>
        
        </tr></table>

    
    <br>
      <br>
      <br>
     
    
    </body>
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