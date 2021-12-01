<?php
    require '../controller/commandeC.php';

 $commandeC = new commandeC();

//tri//
                $commandeS = $commandeC->affichercommande();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> AIM </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="achat.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <nav>
        <h1>AIM</h1>
        <div class="onglets">
            <a href="C:\xampp\htdocs\FORMATIONnn\view\achat.html">Home</a>
            <a href="C:\Users\user\Desktop\web\panier.html">achat</a>
            <a href="#contact">Contact</a>
           <a href="panier.php"
            <i class="fa fa-shopping-cart"></i></a>
        </div>
    </nav>

      

      <header>
    
      </header>
      <br>
      <br>
      <br>
      <br> <br> <br> 



      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

  <tr>
    <th>ID_Commande</th>
    <th>ID_OFFRE</th>
    <th>ID_CLIENT</th>
    <th>COMPTE_CB</th>
   
  </tr>
  
  <?php 
                foreach($commandeS as $commande) {
        ?>

                                                <td><?php echo $commande['ID_Commande'] ; ?></td>
                                                <td><?php echo $commande['ID_OFFRE'] ; ?></td>
                                                <td><?php echo $commande['ID_CLIENT'] ; ?></td>
                                                <td><?php echo $commande['COMPTE_CB'] ; ?></td>
                                               
                                                <td><a href="">achat</a></td>
                                                </tr>
                                            
                                                </div>
                      </div>
                  </div>

              </div>
              <!-- /.container-fluid -->

          </div>


      <?php
              }
      ?>
</table>
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