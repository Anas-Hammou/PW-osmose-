<?php
    require '../controller/articleC.php';

 $articleC = new articleC();
    $articleS = $articleC->afficherarticle();
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

<form method="post" align=center>

               
                    </form>

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=article",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search` WHERE titre = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		
				<td><?php echo $row->titre; ?></td>
			

<?php 
	}

}

?>
  <section>
  <?php 
                foreach ($articleS as $article) {
        ?>


<tr >

<div id="corps" align=center >
    <table width=100% border=6 cellspacing=12 cellpadding=5>
        <tr>
        <tr>
           
              <table  class="table_2">
                <div class="latest-news pt-150 pb-150">
	

  <div class="row">
    <div >
      <div class="single-latest-news">
        <a href="ai1.html"><div class="latest-news-bg news-bg-1"></div></a>
        <div class="news-text-box">
      
        <p class="blog-meta">
                        
    
							<td>	<span class="author"><i class="fas fa-user"></i>    <colspan=2 > <?php echo $article['auteur'] ; ?>  </span></td>
              <td > <span class="date"><i class="fas fa-calendar"></i> <?php echo $article['date'] ; ?></span>  </td> 
            </p>                
                    </tr>
                    <tr >
                    
                        <td rowspan=2><p class="excerpt"><?php echo $article['description'] ; ?></p>
							<a href="ai1.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a></td>
                        <h3><a href="ai1.html"> <td colspan=2 > <?php echo $article['titre'] ; ?>  </td></a></h3>
                          

                    </tr>
                    <tr height=40> 
                        
                        <td >    <img class="im" src="image/tech.jpg"  alt=""onclick=window.location.href='ai1.html'></td> 
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
<!DOCTYPE html>
