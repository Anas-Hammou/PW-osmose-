<?php
    require '../Controller/reclamationC.php';

    $reclamationC = new reclamationC();
    $reclamationC->supprimerformation($_GET['idrec']);
    header('Location:afficherreclamation.php');
?>