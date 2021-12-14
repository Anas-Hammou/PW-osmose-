<?php
    require '../controller/reclamationC.php';

    $articleC = new reclamationC();
    $articleC->supprimerformation($_GET['idrec']);
    header('Location:afficherreclamation.php');
?>