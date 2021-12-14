<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<?php

    require_once     '../controller/participantC.php';
    require_once '../model/participant.php' ;



    if (isset($_POST['idparticipant'] ) && isset($_POST['idoffre'] ) && isset($_POST['idclient'] )) 
    {
            $formation = new participant($_POST['idparticipant'] , $_POST['idoffre'] ,$_POST['idclient']);
            $formationC= new participantC();
            $formationC->ajouterformation($formation);
            header('Location:afficherparticipant.php');
    }


?>


<form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idparticipant">idparticipant :
                        </label>
                    </td>
                    <td><input type="number" name="idparticipant" id="idparticipant" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="idoffre">idoffre:
                        </label>
                    </td>
                    <td><input type="number" name="idoffre" id="idoffre" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="idclient">idclient:
                        </label>
                    </td>
                    <td><input type="number" name="idclient" id="idclient" maxlength="20"></td>
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
           <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<style>
    .bg-login-image {
  background: url(https://images.theconversation.com/files/199508/original/file-20171215-17857-cns8cs.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=926&fit=clip);
  background-position: center;
  background-size: cover;
}

.bg-register-image {
  background: url(https://images.theconversation.com/files/199508/original/file-20171215-17857-cns8cs.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=926&fit=clip);
  background-position: center;
  background-size: cover;
}

    </style>

</html>