<?php

    require_once     '../controller/achatC.php';
    require_once '../model/achat.php' ;



    if (isset($_POST['ID_ACHAT'] ) && isset($_POST['TITRE'] )&& isset($_POST['PRIX'] )&& isset($_POST['ID_COMMANDE'] ) && isset($_POST['COMPTE_CB'] )) 
    {
            $achat = new achat($_POST['ID_ACHAT'] , $_POST['TITRE'], $_POST['PRIX'], $_POST['ID_COMMANDE'] ,$_POST['COMPTE_CB'],);
            $achatC = new achatC();
            $achatC->ajouterachat($achat);
            header('Location:afficherachat.php');
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
</head>
<body>
    <nav>
        <h1>AIM</h1>
        <div class="onglets">
            <a href="C:\xampp\htdocs\FORMATIONnn\assets\achat.html">Home</a>
            <a href="C:\Users\user\Desktop\web\panier.html">achat</a>
            <a href="#contact">Contact</a>

        </div>
    </nav>

      

      <header>
    
      </header>
      <br>
      <br>
      <br>
      <br> <br> <br> 
      
 <script src="../admin/verif.js"></script>
<form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID_ACHAT">ID_ACHAT:
                        </label>
                    </td>
                    <td><input type="number" name="ID_ACHAT" id="ID_ACHAT" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="'TITRE">TITRE:
                        </label>
                    </td>
                    <td><input type="varchar" name="TITRE" id="TITRE" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="PRIX">PRIX:
                        </label>
                    </td>
                    <td><input type="number" name="PRIX" id="PRIX" maxlength="20"></td>
                </tr> 
                <tr>
                    <td>
                        <label for="ID_COMMANDE">ID_COMMANDE:
                        </label>
                    </td>
                    <td><input type="number" name="ID_COMMANDE" id="ID_COMMANDE" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="COMPTE_CB">COMPTE_CB:
                        </label>
                    </td>
                    <td><input type="varchar" name="COMPTE_CB" id="COMPTE_CB" maxlength="20"></td>
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



<br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer>

        <br>
/<br>
                        </br> 
                        </br>
    
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