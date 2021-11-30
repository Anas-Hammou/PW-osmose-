<?php
    require '../controller/articleC.php';
    $articleC = new articleC();
    $articleS = $articleC->afficherarticle();
?>
<?php
    require '../controller/categorieC.php';
    require_once '../model/categorie.php';
 $categorieC = new categorieC();
    $categorieS = $categorieC->affichercategorie();
?>
<?php

$cat = $_GET['cat'];
?>
<?php
 $article = "SELECT * FROM article Where nomcategorie =".$cat." ";
$art1 =($article);


?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> AIM </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="articlee.css">
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
  <section>
  <?php 
                foreach ($articleS as $article) {
        ?>
         <?php 
                foreach ($categorieS as $categorie) {
        ?>

<div id="corps" align=center >
<?php if ( $categorie['nomcategorie'] == $article['nomcategorie'] ) {?>
    <table width=80% border=6 cellspacing=12 cellpadding=20>
        <tr>
            <td class="td_livre" >
              <table  class="table_2">
                <tr height=40> 
      
                        <td >    <?php echo $article['date'] ; ?></td> 
                    
                        <td colspan=2 > <?php echo $article['auteur'] ; ?> </td>                       
                    </tr>
                    <tr >
                        <td rowspan=2><?php echo $article['description'] ; ?></td>
                           <td colspan=2 > <?php echo $article['titre'] ; ?>  </td>

                    </tr>
                    <tr height=40> 
                        <td class="td_Star">     <a class="star">★</a><a class="star">★</a><a class="star">★</a><a class="star">★</a><a class="star">★</a>      </td>                  </TD> 
                        <td >   <?php echo $article['nomcategorie'] ; ?></td>                       
                 </tr>
               </table>
             </td>
           </tr>
        
        <?php
                }
        ?>
        <?php } ?>
        <?php
                }
        ?>
    </table>
</div>
</section>
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