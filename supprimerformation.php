<?php
    require '../controller/formationC.php';

    $articleC = new articleC();
    $articleC->supprimerformation($_GET['id']);
    header('Location:afficherformations.php');
?>