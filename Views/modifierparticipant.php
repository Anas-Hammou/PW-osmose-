<?php

    require_once     '../controller/participantC.php';
    require_once '../Model/participant.php' ;
    $formationC = new participantC();

    if ((isset($_POST['idparticipant'] )) && (isset($_POST['idoffre'] )) && (isset($_POST['idclient'] ))) 
    {
        echo $_POST['idparticipant'] ;
            $formation = new participant($_POST['idparticipant'] , $_POST['idoffre'] ,$_POST['idclient']);
            $formationC->modifierparticipant($formation);
            header('Location:afficherformations.php');
    }else
    {
         $formationC->getparticipantbyID($_GET['idparticipant']) ;
     
    }

?>
<form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idparticipant">idparticipant :
                        </label>
                    </td>
                    <td><input type="number" name="idparticipant" id="idparticipant" maxlength="20" value="<?php echo $formation['idparticipant'];?>"  readonly></td>
                </tr>
				<tr>
                    <td>
                        <label for="idoffre">idoffre:
                        </label>
                    </td>
                    <td><input type="number" value="<?php echo $formation['idoffre'];?>" name="idoffre" id="idoffre" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="idclient">idclient:
                        </label>
                    </td>
                    <td><input type="number" value="<?php echo $formation['idclient'];?>" name="idclient" id="idclient" maxlength="20"></td>
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