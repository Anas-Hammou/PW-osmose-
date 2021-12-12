<?php


    require_once     '../controller/commandeC.php';
    require_once '../model/commande.php' ;



    if (isset($_POST['ID_commande'] ) && isset($_POST['ID_OFFRE'] ) && isset($_POST['ID_CLIENT'] ) && isset($_POST['COMPTE_CB'] )) 
    {
            $commande = new commande($_POST['ID_commande'] , $_POST['ID_OFFRE'],$_POST['ID_CLIENT'] ,$_POST['COMPTE_CB'],);
            $commandeC = new commandeC();
            $commandeC->ajoutercommande($commande);
            header('Location:panier.php');
    }



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AIM </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="achat.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <nav>
        <h1>AIM</h1>
        <div class="onglets">
            <a href="#">Home</a>
            <a href="C:\Users\user\Desktop\web\panier.html">achat</a>
            <a href="#contact">Contact</a>
           <a href="panier.php"
            <i class="fa fa-shopping-cart"></i></a>
        </div>
    </nav>

      

      <header>
    
      </header>
      <br>
      <br>
      <br>
      <br> <br> <br> 

      <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID_commande">ID_commande:
                        </label>
                    </td>
                    <td><input type="number"  name="ID_commande" id="ID_commande" maxlength="20"  ></td>
                </tr>
				<tr>
                    <td>
                        <label for="'ID_OFFRE">ID_OFFRE:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $_GET['id_offre'];?>" name="ID_OFFRE"   id="ID_OFFRE"  readonly ></td>
                </tr>
               <tr>
                    <td>
                        <label for="ID_CLIENT">ID_CLIENT:
                        </label>
                    </td>
                    <td><input type="number" name="ID_CLIENT" id="ID_CLIENT" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="COMPTE_CB">COMPTE_CB:
                        </label>
                    </td>
                    <td><input type="number" name="COMPTE_CB" id="COMPTE_CB" maxlength="20"></td>
                </tr>
                          
                <tr>
                    <td>
                        <input type="submit"  value="enregistrer" onclick="verif()"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>