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
                </tr><tr>
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