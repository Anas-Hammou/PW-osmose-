<?php
    require '../controller/achatC.php';

    $achatC = new achatC();
    $achatC->supprimerachat($_GET['ID_ACHAT']);
    header('Location:afficherachat.php');
?>