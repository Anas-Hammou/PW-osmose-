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
require_once     '../controller/achatC.php';
    require_once '../model/achat.php' ;

    if (isset($_POST['ID_ACHAT'] ) && isset($_POST['TITRE'] )&& isset($_POST['PRIX'] )&& isset($_POST['ID_COMMANDE']  )) 
    {
            $achat = new achat($_POST['ID_ACHAT'] , $_POST['TITRE'], $_POST['PRIX'],10 ,$_POST['COMPTE_CB']);
            $achatC = new achatC();
            $achatC->ajouterachat($achat);      
    }
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

<body align=center>
  <?php
require 'bar.php';
?>


  <header>
    <h1>AIM</h1>
    <h4>Recu.</h4>

  </header>
    
        
          

       
    
    <div>
    <table align="center" class="art">
    <tr><br> <br></tr>
       <tr>
        
        <td>
        <form action="pdf.php" method="POST">
            <label for ="ID_ACHAT:"><p style="color:black">ID_ACHAT:</p>
        </label>
        <input type="number" name="ID_ACHAT" value="<?php echo $_POST['ID_ACHAT']; ?>" readonly>
    </br>
    <br>
          <label for ="TITRE:"><p style="color:black">TITRE:</p>
        </label>
        <input type="text" name="TITRE"  value="<?php echo $_POST['TITRE']; ?>" readonly>
    </br>
    <br>
          <label for ="prix Totale:" back><p style="color:black">PRIX TOTALE:</p>
        </label>
        <input type="number" name="PRIX" value="<?php echo $_POST['PRIX']; ?>" readonly>
    </br>
         
          
</div>
<br>
          </table>
<table align="center">
    <tr><br> <br></tr>
       <tr>
        
        <td> <input type="submit" class="btn btn-dark" value="Imprimer le recu en pdf">  </td>
       </form>
      </tr></table>
      <?php } }
    ob_end_flush();
    ?>