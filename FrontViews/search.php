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
  <link rel="stylesheet" href="arti.css">
  <link rel="shoet icon" href="image/logo.png">
</head>

<body>
<nav>
<?php
require 'bar.php';
?>
    </nav>

  <header>
    <h1>AIM</h1>
    <h4>LE MEILLEUR SITE DE TECHNOLOGIE.</h4>

  </header>
  <nav>
  <div >
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="articlee.php" onclick=window.location.href='articlee.php'>article</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="afficherfrontcategorie.php" onclick=window.location.href='afficherfrontcategorie.php'>categorie</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="search.php" onclick=window.location.href='search.php'>chercher</a>
  </li>
</ul>

      
</div>
</nav>
<br>
<br>
  <html>
<head >
	<title>Search Bar using PHP</title>
</head>
<body>
<?php
  include "../controller/articleC.php";
  $controller = new articleC();
  $articleS = $controller->afficherarticle();
  if(isset($_POST["search"])) {
    $articleS = $controller->gettitre($_POST["q"]);
  }
  $lis = "";
  foreach($articleS as $article) {
      $titre = $article["titre"];
      $lis .= "<li><a href='#'>$titre</a></li>";
  }
  $table = "";
      foreach($articleS as $article) {
        $id=$article["id"];
        $titre = $article["titre"];
        $description = $article["description"];
        $auteur = $article["auteur"];
        $date = $article["date"];
        $tr = "
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
                            
        
                                <td>	<span class='author'><i class='fas fa-user'></i>    <colspan=2 >  $auteur   </span></td>
                  <td > <span class='date'><i class='fas fa-calendar'></i>  $date </span>  </td> 
                </p>                
                        </tr>
                        <tr >
                  
                        <td rowspan=2><p class='excerpt'> $description</p>
                         <a  class='read-more-btn' href='filtrarticle.php?id= $id'> read more <i class='fas fa-angle-right'></i></a> </td>
                        <h3><td colspan=2 >  $titre </td></h3>
                              
    
                        </tr>
                     
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
    </div>";
           $table.=$tr;
      }
          
?>
<div id="corps" align=center >
<form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
<div class="input-group" >
<input type="search" name="q" placeholder="Recherche..."  class="form-control bg-light border-0 small" aria-describedby="basic-addon2"/>
<div class="input-group-append">
<button class="btn btn-primary" name="search" type="submit" value="Valider" > <i class="fas fa-search fa-sm"></i></button>
</div>
                        </div>
</form>
</div>
<section>
  <?= $table 
             /*   foreach ($articles as $article) {
        ?>
<div id="corps" align=center >
    <table width=80% border=6 cellspacing=12 cellpadding=20>
        <tr>
            <td class="td_livre" >
              <table  class="table_2">
                <tr height=40> 
      
                           <td><?php echo $article['description'] ; ?></td>  
                        <td colspan=2 >   <?php echo $article['nomcom'] ; ?></td>                        
                    </tr>
                    <tr >
                        <td   rowspan=2><?php echo $article['prenom'] ; ?></td>
                           <td colspan=2 >
                            <?php echo $article['metier'] ; ?>
                           
                            
                           </td>

                    </tr>
                    <tr height=40> 
                    <td >   <?php echo $article['email'] ; ?></td>  
                        <td class="td_Star">     <a class="star">★</a><a class="star">★</a><a class="star">★</a><a class="star">★</a><a class="star">★</a>      </td>                  </TD> 
                                             
                 </tr>
               </table>
             </td>
           </tr>
        
        <?php
                }*/
        ?>
    </table>
</div>
</section>
<?php
function afficherarticle($idcategorie)
    { try{
        $pdo = getConnexion ();
        $query = $pdo->prepare (
            'SELECT * FROM article where categorie = :id'
        );
        $query-> execute ([
            'id' => $idcategorie
        ]);
        return $query-> fetchAll();
    }catch (PDOException $e){
        $e->getMessage();
    }
}
    ?> 
    </body>
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
<!DOCTYPE html>
