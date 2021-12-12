<?php
        ob_start();
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION["username"]))
        {
            header('Location:login.php');
        }else 
        {
            if ($_SESSION["role_user"] == "Administrateur")
                header("Location:../BackViews/index.php") ;
            else
            {
 
    require_once     '../Controller/reclamationC.php';
    require_once '../Model/reclamation.php' ;



    if (isset($_POST['idrec'] )  && isset($_POST['texte'] )) 
    {
            $article = new reclamation($_POST['idrec'] , $_POST['texte']);
            $articleC= new reclamationC();
            $articleC->ajouterformation($article);

    }

   
?>

<!DOCTYPE html>
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
  <?php
require 'bar.php';
?>


  <header>
    <h1>AIM</h1>
    <h4>LE MEILLEUR SITE DE TECHNOLOGIE.</h4>

  </header>

<div class="container">
  <form action="" method="POST">
    <div class="row">
      <!--<div class="col-25">
        <label for="idrec">identifiant</label>
      </div>-->
      <div class="col-75">
        <input type="number" value="<?php echo $_SESSION['id_user'] ;?>" id="idrec" name="idrec" hidden>
      </div>
    </div>
  
   
    <div class="row">
      <div class="col-25">
        <label for="texte">reclamation</label>
      </div>
      <div class="col-75">
        <textarea id="texte" name="texte" placeholder="y'a t'il de problème?.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="envoyer"onclick="verif()" color=red> 
    </div>
  </form>
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

        <p id="contact">Contact : telephone: +216 70 000 111 | Facebook/Instagram: AIM | Gmail: AIM.ESPRIT@gmail.com |
            &copy; 2021, AIM.</p>
        </footer>
    </body>
    <style>
 
      /* Toutes les cartes */
.cards{
    display:flex;
    flex-wrap:wrap;
    margin-right: 190px;
     margin-top: 30px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    text-align: center;
    

  }
  
  .card .card-body p{
  margin-top: 10px;
 margin-left: 175px;
  }
.card .price {
  color: green;
  font-size: 22px;
  margin-left:100px;

}
.title {
  color : red;
  font-size: 22px;
}
  

  /* Fin de toutes les cartes */
  /* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}



/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
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
    margin-top: 0px;
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


/*
  header{
    display: flex;
    flex-direction: column;
    align-items: center;
    background: url('https://www.admaiorem.com/wp-content/../uploads2021/10/5-beneficios-de-la-tecnologia-al-servicio-del-hombre.jpg');
    background-size: 1500px;
    color: #fff;
    padding: 350px;
    
}*/
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
    <?php } }
    ob_end_flush();
    ?>