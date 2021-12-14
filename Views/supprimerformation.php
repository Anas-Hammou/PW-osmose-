<?php
    require '../controller/formationC.php';

    $articleC = new formationC();
    $articleC->supprimerformation($_GET['id']);
    header('Location:afficherformations.php');
?>