<?php
session_start();
require_once     '../Controller/participationC.php';
require_once '../model/participation.php' ;
require_once '../Controller/evenementC.php';
$evenementC = new evenementC();
if (
    isset($_GET['idev']) &&
    isset($_SESSION['email_user']) &&
    isset($_SESSION['id_user'])
) {
    $id = rand(1,10000);
    $participation = new participation($id,$_GET['idev'],$_SESSION['id_user'] ,$_SESSION['email_user'] );
    $participationC = new participationC();
    $participationC->ajouterparticipation($participation);
    $list = $participationC->afficherparticipationbyevent($_GET['idev']);
    $nbr = count($list);
    $evenementC->incparticipants($_GET['idev'],$nbr);
    header('Location:evenement.php');
}
?>