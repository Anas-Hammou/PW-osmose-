<?php

    require_once     '../controller/achatC.php';
    require_once '../model/achat.php' ;
    $achatC = new achatC();
    

    if (isset($_POST['ID_ACHAT'] ) && isset($_POST['TITRE'] )  && isset($_POST['PRIX'] )  && isset($_POST['ID_COMMANDE'] ) && isset($_POST['COMPTE_CB'] )) 
    {
        echo $_POST['ID_ACHAT'] ;
            $achat = new achat($_POST['ID_ACHAT'] , $_POST['TITRE'] , $_POST['PRIX'], $_POST['ID_COMMANDE'] ,$_POST['COMPTE_CB']);
            $achatC->modifierachat($achat);
            header('Location:afficherachat.php');
    }else
    {
        $a = $achatC->getachatbyID($_GET['ID_ACHAT']) ;
     
    }
?>
<form action="modifier.php" method="POST">
<table border="1" align="center">
                <tr>
                    <td>
                        <label for="ID_ACHAT">ID_ACHAT:
                        </label>
                    </td>
                    <td><input type="number" name="ID_ACHAT" id="ID_ACHAT" maxlength="20" value="<?php echo $a['ID_ACHAT'];?>"  readonly></td>
                </tr>
				<tr>
                    <td>
                        <label for="TITRE">TITRE:
                        </label>
                    </td>
                    <td><input type="text"  name="TITRE" id="TITRE"   maxlength="20"  value="<?php echo $a['TITRE'];?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="PRIX">PRIX:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $a['PRIX'];?>" name="PRIX" id="PRIX" maxlength="20"></td>
                </tr>             
                <tr>
                    <td>
                        <label for="ID_COMMANDE">ID_COMMANDE:
                        </label>
                    </td>
                    <td><input type="text" value="<?php echo $a['ID_COMMANDE'];?>" name="ID_COMMANDE" id="ID_COMMANDE" maxlength="20"></td>
                </tr> 
                <tr>
                    <td>
                        <label for="COMPTE_CB">COMPTE_CB:
                        </label>
                    </td>
                    <td><input type="number" value="<?php echo $a['COMPTE_CB'];?>" name="COMPTE_CB" id="COMPTE_CB" maxlength="20"></td>
                </tr>              
                <tr>           
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>