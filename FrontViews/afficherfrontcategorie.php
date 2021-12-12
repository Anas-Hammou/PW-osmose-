<?php
   
   
    require '../controller/categorieC.php';
    require_once '../model/categorie.php';
 $categorieC = new categorieC();
    $categorieS = $categorieC->affichercategorie();
?>

<!DOCTYPE html>
<html lang="fr">


    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
 
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> AIM </title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="arti.css">
  <link rel="shoet icon" href="image/logo.png">
</head>

<body>
 
<?php require 'bar.php'; ?>


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
    <a class="nav-link active" aria-current="page" href="afficherfrontcategorie.php" onclick=window.location.href='afficherfrontcategorie.php'>categorie</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="search.php" onclick=window.location.href='search.php'>chercher</a>
  </li>
</ul>

      
</div>
</nav>
<br>
<br>
<br>

    <section class="type" id="Categorie">

        <div class="typee">
            <div class="typeee">
                <div class="lefti">
                   <tr>

    <nav><h1>categorie</h1></nav>
   <br>
   <br>
   <br>
  </tr>
        <?php 
                foreach ($categorieS as $categorie) {
        ?>



  <body align=center>
      <div align=center>
  <button > <a href='filtrecategorie.php?idcategorie=<?php echo $categorie['idcategorie'] ; ?>'>  
          <span>  <?php echo $categorie['nomcategorie'] ; ?>  </span>
          </a> </button>
       
          </button>
                </div>
        </body>
  
   <br>
  </tr>
  <?php
                }
        ?>
                </div>
                <div class="righti">
                    <img src="image/categorie.jpg" alt="" style="height: 685px">
                </div>
            </div>
        </div>
     
    
   
</div>

        <footer>

            <h1>Nos services</h1>

            <p>Découvrez nos services en ligne complets .</p>
            <br>

            <div class="service">
                <h3>Paiement en ligne</h3>
                <p>Découvrez les méthodes facile de Paiement en ligne ( paiment banquaire ).</p>
            </div>


            </div>

            <p id="contact">Contact : telephone: +216 70 000 111 | Facebook/Instagram: AIM | Gmail: AIM.ESPRIT@gmail.com
                |</p>
                &copy; 2021, AIM.</p>
        </footer>
</body>

</html>
