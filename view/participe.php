<?php
session_start();
require_once     '../controller/participationC.php';
require_once '../model/participation.php' ;
if (
    isset($_GET['idev']) &&
    isset($_SESSION['email_user']) &&
    isset($_SESSION['id_user'])
) {
    $id = rand(1,10000);
    $participation = new participation($id,$_GET['idev'],$_SESSION['id_user'] ,$_SESSION['email_user'] );
    $participationC = new participationC();
    $participationC->ajouterparticipation($participation);
    header('Location:evenement.php');
}
?>