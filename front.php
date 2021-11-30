<?php

require '../controller/formationC.php';
require '../controller/participantC.php';


$articleC = new articleC();
   $articleS = $articleC->afficherformation();
   $participantC = new participantC();
   $articleS = $articleC->afficherformation();

?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Site Vitrine - Frenchcoder</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="front.css">
    </head>
    <body>
        <nav>
            <h1>AIM</h1>
            <div class="onglets">
                <a href="#">Home</a>
                <a href="#contact">Contact</a>
                <div class="dropdown">
                    <button href="#produits">produits
                      <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="#">par participation</a>
                      <a href="#">Link 2</a>
                      <a href="#">Link 3</a>
                    </div>
                </div>
                </div>
        </nav>
    
        <header>
       
        </header>
    
  <section class="produits" id="produits">
  
<div class="cards">
<?php foreach($articleS as $article): ?>
    <div class="card">
    
      <img src="<?php echo $article['id'].".jpg"; ?>"alt="" style="width:400">
      <div class="card-header">
        <h4 class="title"><?php echo $article['titre'];?></h4>
        <h4 class="price"><?php echo $article['prix'];?>TND</h4>
      </div>
      <div class="card-body">
      <h4 class="description"><?php echo $article['description'];?></h4>
      
      <h4 class="participants">nombre de participants : <?php echo $article['participants'];?></h4>
      <p>par <?php echo (substr($article['formateur'], 0, 200)); ?></p>
      <p><button>acheter</button></p>
      </div>
      <?php endforeach;?>  
      </div> 
     

    
</section>

                 <!-- Fin de toutes les formations -->
                 

        <footer>
    
            <h1>Nos services</h1>
            <div class="services">
                
                <div class="service">
                    <h3>Livraison gratuite</h3>
                   
                </div>
    
                <div class="service">
                    <h3>Paiement en ligne</h3>
                  
                </div>
    
                <div class="service">
                    <h3>Aimé ou remboursé</h3>
            
                </div>
    
            </div>
    
            <p id="contact">Contact : 08 19 17 278 1 | &copy; 2021, Burgure.</p>
        </footer>
    </body>
    <style>
 
      /* Toutes les cartes */
.cards{
    display:flex;
    flex-wrap:wrap;
  
  }
  .cards .card{
    margin-right: 1px;
    cursor:pointer;
    
  
  }
  .cards .card img{
    width: 400px;
   
   
  }
  .cards .card .card-header{
    display: flex;
    flex-wrap:wrap;
    justify-content: space-between;
    margin-right: 50px;
  }
  .cards .card .card-body p{
    margin-top: -10px;
   
  }
  .card button {
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 80%;
  font-size: 18px;
  margin-right: 50px;
}
  /* Fin de toutes les cartes */

</style>
  
    </html>