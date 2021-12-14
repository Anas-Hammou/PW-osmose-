
 <?php
    require '../controller/formationC.php';
    $articleC = new articleC();
if (isset($_GET['id'])) {
    $article = $articleC->afficherformation($_GET['id']);
}else if (isset($_POST['id'])){
    $article = $articleC->triParId();
}else if (isset($_GET['tri'])) {
    $article = $articleC->recherche($_GET['id']);
}else {
    $article = $articleC->afficherformation();
}
 
    
?>