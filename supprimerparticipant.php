<?php
    require '../controller/participantC.php';

    $articleC = new participantC();
    $articleC->supprimerparticipant($_GET['id']);
    header('Location:afficherparticipant.php');
?>