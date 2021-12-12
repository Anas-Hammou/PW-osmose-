<?php
    require '../controller/participationC.php';

    $participationC = new participationC();
    $participationC->supprimerparticipation($_GET['id']);
    header('Location:afficherparticipation.php');
?>