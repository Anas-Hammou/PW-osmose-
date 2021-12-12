<?php
    require '../controller/participantC.php';

    $formationC = new participantC();
    $formationC->supprimerparticipant($_GET['id']);
    header('Location:afficherparticipant.php');
?>