<?php
    require '../controller/commandeC.php';

    $commandeC = new commandeC();
    $commandeC->supprimercommande($_GET['id']);
    header('Location:panier.php');
?>