<?php

require '../controller/formationC.php';
require '../controller/participantC.php';


$articleC = new articleC();
   $articleS = $articleC->afficherformationparcategorie();
   $participantC = new participantC();
  
  
   $participantC = new participantC();
   $articleS = $articleC->afficherformation();


?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AIM </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="article.css">
    <link rel="shoet icon" href="https://thumbs.dreamstime.com/z/eagle-logo-design-inspiration-vector-conception-de-d-calibre-ic-ne-aile-148064393.jpg">
</head>

<body>
    <nav>

        <h1>AIM</h1>
        <div class="onglets">
            <a href="#">Home</a>
            <a href="#Categorie" onclick=window.location.href='categorie.html'>Categories</a>
            <a href="#Articles" >article</a>
            <a href="#Citations">Citations Technologies</a>
            <a href="#commentaire" onclick=window.location.href='commentaire.html'>Commentaire</a>
            <a href="#contact">Contact</a>
            <div class="dropdown">
  <button class="dropbtn">formations</button>
  <div class="dropdown-content">
    <a href="#produits"onclick=window.location.href='participants.php'>par participants</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>

         

</div>
           
    </nav>
    <header>
        <h1>AIM</h1>
        <h4>LE MEILLEUR SITE DE TECHNOLOGIE.</h4>

    </header>

    
  <section class="produits" id="produits">
  
<div class="cards">
<?php foreach($articleS as $article): ?>
    <div class="card">
    
      <img src="<?php echo $article['id'].".jpg"; ?>"alt="" style="width:400">
      <div class="card-header">
        <h4 class="title">formation <?php echo $article['titre'];?></h4>
        <h4 class="price">price :<?php echo $article['prix'];?>TND</h4>
      </div>
      <div class="card-body">
      <h4 class="description"><?php echo $article['description'];?></h4>
      <h4 class="categorie"><?php echo $article['categorie'];?></h4>

      
      <h4 class="participants">nombre de participants : <?php echo $article['participants'];?></h4>
      <span>
        "par "
     <a href = https://www.maxdegenie.com/conseils-et-astuces/quest-ce-que-le-regime-keto/ >
       <strong> <?php echo $article['formateur'];?>
</a>
</span>
      <p><button>acheter</button></p>
      </div>
      <?php endforeach;?>  
      </div> 
     

    
</section>

                 <!-- Fin de toutes les formations -->
                 

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
    <style>
 
      /* Toutes les cartes */
.cards{
    display:flex;
    flex-wrap:wrap;
    margin-left: 175px;
    margin-top: 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    text-align: center;

  }
  
  .card .card-body p{
  margin-top: 10px;
}
.price {
  color: red;
  font-size: 22px;
  margin-left:60px;

}
.title {
  color : red;
  font-size: 22px;
}
  
}
  /* Fin de toutes les cartes */
  @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap');
html{
    scroll-behavior: smooth;
}
body{
    
    margin: 0px;
    padding: 0px;
    font-family: 'Montserrat', sans-serif;
  
}


nav{
    display:flex;
    flex-wrap:wrap;
    justify-content: center;
    align-items: center;
    border-bottom: 5px solid #ada9a9;
}
nav h1{
    color: #717171;
    font-family: 'Playfair Display', serif;
    font-size: 30px;
}
nav .onglets{
    margin-top: 3px;
    margin-left: 300px;
}
nav .onglets a{
    text-decoration: none;
    color: #000;
    margin-right: 10px;
    border-bottom: 1px solid #000;
    padding-bottom: 5px;
}
button {
    display: inline-block;
    background-color: #777676;
    border-radius: 10px;
    border: 4px double #cccccc;
    color: #eeeeee;
    text-align: center;
    font-size: 28px;
    padding: 20px;
    width: 200px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
    }



  header{
    display: flex;
    flex-direction: column;
    align-items: center;
    background: url('http://www.kapsicum.fr/wp-content/uploads/2012/10/ecommerce-navigation.jpg');
    background-size: 1500px;
    color: #fff;
    padding: 350px;
    
}
header h1{
    font-family: 'Playfair Display', serif;
    font-size: 50px;
    margin-top: -300px;
}
header h4{
    margin-top: 15px;
    font-size: 20px;
    text-align: center;
    border-bottom: 1px solid #fff;
}

footer{
    margin-top: 40px;
    border-top: 5px solid #6f6f6f;
    background-color: rgb(0, 0, 0);
    color: #fff;
    padding: 20px 200px;;
}
footer h1{
    font-family: 'Playfair Display', serif;
    border-bottom: 1px solid white;
    width: 20%;
    padding-bottom: 5px;
}
footer .services{
    margin-top: -10px;
    display:flex;
    flex-wrap:wrap;
}
footer .services .service{
    margin-right: 30px;
}
footer .services .service p{
    max-width: 300px;
}
footer #contact{
    color: rgb(72, 16, 117);
}
.dropbtn {
  background-color: #f8f0f0;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  
}

.dropdown {
  position: relative;
  display: inline-block;
   
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
 
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

</style>



</style>
  
    </html>