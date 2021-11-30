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

    require_once     '../controller/formationC.php';
    require_once '../model/formation.php' ;



    if (isset($_POST['id'] ) && isset($_POST['titre'] ) && isset($_POST['description'] ) &&  isset($_POST['categorie'] ) &&  isset($_POST['prix'] )  &&  isset($_POST['formateur'] ) &&  isset($_POST['participants'] )) 
    {
            $article = new article($_POST['id'] , $_POST['titre'] ,$_POST['description'],$_POST['categorie'],$_POST['prix'],$_POST['formateur'],$_POST['participants']);
            $articleC= new articleC();
            $articleC->ajouterformation($article);
            header('Location:afficherformations.php');
    }


?>
<script src="formation.js"></script>
<form action="" method="POST">
<script src="formation.js"></script>
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">id :
                        </label>
                    </td>
                    <td><input type="number" name="id" id="number" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="titre">titre:
                        </label>
                    </td>
                    <td><input type="text" name="titre" id="titre" maxlength="60"></td>
                </tr>
                <tr>
                    <td>
                        <label for="description">description:
                        </label>
                    </td>
                    <td><input type="text" name="description" id="description" maxlength="300"></td>
                </tr>    
                <tr>
                    <td>
                        <label for="categorie">categorie:
                        </label>
                    </td>
                    <td><input type="text" name="categorie" id="categorie" maxlength="20"></td>
                </tr>   
                <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="text" name="prix" id="prix" maxlength="20"></td>
                </tr>   
                <tr>
                    <td>
                        <label for="formateur">formateur:
                        </label>
                    </td>
                    <td><input type="text" name="formateur" id="formateur" maxlength="20"></td>
                </tr>            
                <tr>
                    <td>
                        <label for="participants">participants:
                        </label>
                    </td>
                    <td><input type="number" name="participants" id="participants" maxlength="20"></td>
                </tr>  
                <tr>
                    <td>
                        <input type="submit"  value="enregistrer" onclick="return verif();"> 
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