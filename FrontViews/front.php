<?php
    if(!isset($_SESSION)){
		session_start();
	}
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AIM </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="article.css">
</head>

<body>
    <nav>
        <?php 
            if (isset($_SESSION["username"]))
            { ?>
                <h1>AIM</h1>
                <div class="onglets">
                    <a href="#" onclick=window.location.href='front.php'>Home</a>
                    <a href="#">Article</a>
                    <a href="#">Categorie</a>
                    <a href="#contact">Contact</a>
                    <a href="compteUtilisateur.php">Mon compte</a>
                </div> 
           <?php }else
            { ?>
                <h1>AIM</h1>
                <div class="onglets">
                    <a href="#" onclick=window.location.href='front.php'>Home</a>
                    <a href="#">Article</a>
                    <a href="#">Categorie</a>
                    <a href="#contact">Contact</a>
                    <a href="signup.php" onclick=window.location.href='signup.php'>Sign up</a>
                    <a href="login.php" onclick=window.location.href='login.php'>Log in</a>
                </div>
        <?php } ?>
    </nav>

    <header>
        <h1>AIM</h1>
        <h4>LE MEILLEUR SITE DE TECHNOLOGIE.</h4>

    </header>

    <section class="main" id="Novtech">

        <div class="content">
            <div class="card">
                <div class="left">
                    <h1>LES NOUVELLES TECHNOLOGIES</h1>
                    <p>Les « nouvelles technologies » désignent des domaines très évolutifs et des techniques diverses,
                        pouvant rendre plus accessible les rapports entre les Hommes et les machines : ... au sens
                        étroit, les nouvelles techniques de l'information et de la communication (TIC) (Internet,
                        Smartphone, protocole Bluetooth…).</p>
                </div>
                <div class="center">
                    <img src="image/tech.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
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