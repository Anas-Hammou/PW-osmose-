<?php

require_once     '../controller/articleC.php';
    require_once '../model/article.php' ;
    require_once '../model/categorie.php';
    require_once '../Controller/categorieC.php';

 $articleC = new articleC();
    $articleS = $articleC->afficherarticle();
    $categorieC=new categorieC();
        $resultats=$categorieC->affichercategorie();
?>
<div class="text-center">
  <button onclick="window.print();" class="btn btn-primary"id="print-btn"> print </button>

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

    <h1>AIM</h1>
  

    </div>
  </nav>


  <html>

<body>

<form method="post" align=center>

               
                    </form>

</body>
</html>


<link rel="stylesheet" type="text/css" href="printt.css" media="print">
<?php

$con = new PDO("mysql:host=localhost;dbname=osmose",'root','');

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
					
                        <h3><a href="ai1.html"> <td colspan=2 > <?php echo $article['titre'] ; ?>  </td></a></h3>
                          

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

