<?php
    require '../controller/categorieC.php';

    $categorieC = new categorieC();
    $categorieC->supprimercategorie($_GET['id']);
    header('Location:affichercategorie.php');
?>