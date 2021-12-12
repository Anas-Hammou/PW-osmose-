<?php
    require '../controller/commandeC.php';

    $commandeC = new commandeC();
    $commandeC->supprimercommande($_GET['ID_Commande']);
    header('Location:affichercommande.php');
?>