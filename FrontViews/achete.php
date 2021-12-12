<?php
session_start();
if (isset($_GET['id'])) {
    $ID_OFFRE=$_GET['id'];
    $ID_COMMANDE=rand(1,10000);
    $ID_CLIENT=$_SESSION['id_user'];
    require_once '../Controller/commandeC.php';
    require_once '../Model/commande.php';
    $commande = new commande($ID_COMMANDE,$ID_OFFRE,$ID_CLIENT);
    $commandeC = new commandeC();
    $commandeC->ajoutercommande($commande);
    header('location:panier.php');
}
?>