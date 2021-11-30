<?php

    require_once     '../controller/participantC.php';
    require_once '../model/participant.php' ;
    $article=null;
    $articleC = new participant();
    if (
        isset($_POST["idparticipant"]) &&
		isset($_POST["idoffre"]) &&		
        isset($_POST["idclient"]) 
    ) {
        if (
            !empty($_POST["idparticipant"]) && 
			!empty($_POST["idoffre"]) &&
            !empty($_POST["idclient"]) 
			
        ) {
            $article = new article(
                $_POST['idparticipant'],
				$_POST['idoffre'],
                $_POST['idclient'], 
            );
            print_r($article);
            $articleC->modifierformation($article, $_POST["idparticipant"]);
            header('Location:afficherparticipant.php');
        }
        else
        {
        $error = "Missing information";
        }
    }
?>
<form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idparticipant">idparticipant :
                        </label>
                    </td>
                    <td><input type="number" name="idparticipant" id="idparticipant" maxlength="20" value="<?php echo $article['idparticipant'];?>"  readonly></td>
                </tr>
				<tr>
                    <td>
                        <label for="idoffre">idoffre:
                        </label>
                    </td>
                    <td><input type="number" value="<?php echo $article['idoffre'];?>" name="idoffre" id="idoffre" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="idclient">idclient:
                        </label>
                    </td>
                    <td><input type="number" value="<?php echo $article['idclient'];?>" name="idclient" id="idclient" maxlength="20"></td>
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