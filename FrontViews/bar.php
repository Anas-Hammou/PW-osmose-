<nav>
        <?php 
            if (isset($_SESSION["username"]))
            { ?>
                <h1>AIM</h1>
                <div class="onglets">
                    <a href="#" onclick=window.location.href='front.php'>Home</a>
                    <a href="articlee.php">article</a>
                    <a href="formations.php" onclick=window.location.href=''>formation</a> 
                    <a href="evenement.php" onclick=window.location.href='evenement.php'>evenement</a>
                    <a href="ajouterreclamation.php" onclick=window.location.href=''>reclamation</a>
                    <a href="#contact">Contact</a>
                    <a href="compteUtilisateur.php">Mon compte</a>
                    <a href="panier.php">Panier</a>

                </div> 
           <?php }else
            { ?>
                <h1>AIM</h1>
                <div class="onglets">
                    <a href="#" onclick=window.location.href='front.php'>Home</a>
                    <a href="articlee.php" onclick=window.location.href='articlee.php'>article</a>
                    <a href="" onclick=window.location.href=''>formation</a>
                    <a href="evenement.php" onclick=window.location.href='evenement.php'>evenement</a>
                    <a href="#contact">Contact</a>
                    <a href="signup.php" onclick=window.location.href='signup.php'>Sign up</a>
                    <a href="login.php" onclick=window.location.href='login.php'>Log in</a>
                </div>
        <?php } ?>
</nav>