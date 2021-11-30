<?php
 include "../controller/articleC.php";
 ?>
<!DOCTYPE html>
<html lang="fr">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> AIM </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="art.css">
  <link rel="shoet icon" href="image/logo.png">
</head>

<body>
  <nav>

    <h1>AIM</h1>
    <div class="onglets">
      <a href="#" onclick=window.location.href='article.html'>Home</a>
      <a href="#contact">Contact</a>

    </div>
  </nav>

  <header>
    <h1>AIM</h1>
    <h4>LE MEILLEUR SITE DE TECHNOLOGIE.</h4>

  </header>
  <html>
<head >
	<title>Search Bar using PHP</title>
</head>
<body>
<meta charset="utf-8" />

<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=article;charset=utf8','root','');

$articleS = $bdd->query('SELECT titre FROM article ORDER BY id DESC');

if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $articleS = $bdd->query('SELECT * FROM article WHERE titre LIKE "%'.$q.'%" ORDER BY id DESC');
   if($articleS->rowCount() == 0) {
      $articleS = $bdd->query('SELECT * FROM articleS WHERE CONCAT(titre, contenu) LIKE "%'.$q.'%" ORDER BY id DESC');
   }
}

?>
<div id="corps" align=center >
<form method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
<div class="input-group" >
   <input  type="search" class="form-control bg-light border-0 small" name="q" placeholder="Recherche..." aria-describedby="basic-addon2"  >
   <div class="input-group-append">
   <button class="btn btn-primary" type="submit" value="Valider" >  <i class="fas fa-search fa-sm"></i></button>
   </div>
                        </div>
                    </form>
</div>
<?php if($articleS->rowCount() > 0) { ?>
   <ul>
   <?php while($a = $articleS->fetch()) { ?>
 <div id='corps' align=center >
        <table width=100% border=6 cellspacing=12 cellpadding=5>
            <tr>
            <tr>
               
                  <table  class='table_2'>
                    <div class='latest-news pt-150 pb-150'>
        
    
      <div class='row'>
        <div >
          <div class='single-latest-news'>
            <a href='ai1.html'><div class='latest-news-bg news-bg-1'></div></a>
            <div class='news-text-box'>
          
            <p class='blog-meta'>
                            
        
                                <td>	<span class='author'><i class='fas fa-user'></i>    <colspan=2 >  <?= $a['auteur'] ?>   </span></td>
                  <td > <span class='date'><i class='fas fa-calendar'></i>  <?= $a['date'] ?> </span>  </td> 
                </p>                
                        </tr>
                        <tr >
                        
                            <td rowspan=2><p class='excerpt'><?= $a['description'] ?> </p>
                                <a href='ai1.html' class='read-more-btn'>read more <i class='fas fa-angle-right'></i></a></td>
                            <h3><a href='ai1.html'> <td colspan=2 > <?= $a['titre'] ?>   </td></a></h3>
                              
    
                        </tr>
                        <tr>
                     
   <td> <img src="image/tech.jpg" width="133" height="139"> </td>

 <tr>
                     
                         </div>
                        </div>
                    </div>
                    </div>
                        </div>
                   </table>
                 </td>
               </tr>
            
            <?php
                    }
            ?>
        </table>
    </div>
   </ul>
<?php } else { ?>
Aucun résultat pour: <?= $q ?>...
<?php } ?>
<footer>

<h1>Nos services</h1>

<p>Découvrez nos services en ligne complets .</p>
<br>

<div class="service">
    <h3>Paiement en ligne</h3>
    <p>Découvrez les méthodes facile de Paiement en ligne ( paiment banquaire ).</p>
</div>


</div>

<p id="contact">Contact : telephone: +216 70 000 111 | Facebook/Instagram: AIM | Gmail: AIM.ESPRIT@gmail.com |
    &copy; 2021, AIM.</p>
</footer>
</body>

</html>