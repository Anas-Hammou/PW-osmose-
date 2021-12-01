<?php
require '../controller/evenementC.php';

$evenementC = new evenementC();

$evenement = $evenementC->afficherevenement(); 
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AIM </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="evenement.css">
</head>
<body>
    <nav>
        <h1>AIM</h1>
        <div class="onglets">
            <a href="#">Home</a>
            <a href="#evenement">evenement</a>
            <a href="#contact">Contact</a>

        </div>
    </nav>

    <header>
        <h1>AIM</h1>
        <h4>LE MEILLEUR SITE DE TECHNOLOGIE</h4>

    </header>
    <?php 
                foreach ($evenement as $event) {
        ?>
    <section class="main" id="evenement">

        <div class="content">
            <div class="card">
                <div class="left">
                    <h1><?php echo $event['titre']; ?></h1>
                    <p><?php echo $event['description'];?></p>
                </div>
                <div class="right">
                    <img src="uploads/<?php echo $event['img'];?>" alt="">
                </div>
            </div>

    </section>
    <?php 
               }
        ?>
   
   

   

    <video src="image/5G.mp4" width=1520  height=540 controls poster="vignette.jpg">
        Cette vidéo ne peut être affichée sur votre navigateur Internet.<br>
        Une version est disponible en téléchargement sous <a href="https://www.youtube.com/watch?v=iQeaK0NGMnAL">adresse du lien </a> . 
      </video>
      
      
   
    <footer>

    
        <h1>Nos services</h1>
        <div class="services">
            
            <div class="service">
               
                <p>Découvrez nos services en ligne complets .</p>
            </div>
            <br>

            <div class="service">
                <h3>Paiement en ligne</h3>
                <p>Découvrez les méthodes faciles de Paiement en ligne ( paiment banquaire ).</p>
            </div>

            
        </div>

        <p id="contact">Contact : telephone: +216 70 000 111 | Facebook/Instagram:  AIM | Gmail: AIM.ESPRIT@gmail.com | &copy; 2021, AIM.</p>
    </footer>
</body>
</html>