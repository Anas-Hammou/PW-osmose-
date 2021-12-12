
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
require_once     '../controller/commandeC.php';
require_once '../model/commande.php' ;



if (isset($_POST['ID_commande'] ) && isset($_POST['ID_OFFRE'] ) && isset($_POST['ID_CLIENT'] )) 
{
        $commande = new commande($_POST['ID_commande'] , $_POST['ID_OFFRE'],$_POST['ID_CLIENT'],);
        $commandeC = new commandeC();
        $commandeC->ajoutercommande($commande);
        header('Location:affichercommande.php');
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
                <a href="..\assets/achat.html">Home</a>
                <a href="">achat</a>
                <a href="#contact">Contact</a>
    
            </div>
        </nav>
        </body>
</html>
<br>
        <br>
        <br>
        <br>
        <br>
        <br>

<script src="../admin/verif.js"></script>
<form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID_commande">ID_commande:
                        </label>
                    </td>
                    <td><input type="number" name="ID_commande" id="ID_commande" maxlength="100"></td>
                </tr>
				<tr>
                    <td>
                        <label for="'ID_OFFRE">ID_OFFRE:
                        </label>
                    </td>
                    <td><input type="number" name="ID_OFFRE" id="ID_OFFRE" maxlength="100"></td>
                </tr>
               <tr>
                    <td>
                        <label for="ID_CLIENT">ID_CLIENT:
                        </label>
                    </td>
                    <td><input type="number" name="ID_CLIENT" id="ID_CLIENT" maxlength="100"></td>
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
<?php } }
    ob_end_flush();
    ?>