<?php

require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;/*
$fichier = '<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> AIM </title>
<meta charset="utf-8">
<link rel="stylesheet" href="recu.css">
</head>
<nav>
    <h1>AIM</h1>
    
</nav>
<link rel="stylesheet" href="recu.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<head>

    <head>
        <br>
        <br>
        <br>
            <h1>Recu</h1>
       
    </head> 
      

   
<br>
<div>
      <label for ="ID_ACHAT:">ID_ACHAT:
    </label>
    <form action="pdf.php" method="POST">
    <input type="number" name="ID_ACHAT" value="'.$_POST['ID_ACHAT'].'" readonly>
</br>
<br>
      <label for ="TITRE:">TITRE:
    </label>
    <input type="text" name="TITRE"  value="'.$_POST['TITRE'].'" readonly>
</br>
<br>
      <label for ="prix Totale:">Prix Totale:
    </label>
    <input type="number" name="PRIX" value="'.$_POST['PRIX'].'" readonly>
</br>
     
      
</div>
<br>

<table align="center">
<tr><br> <br></tr>
   <tr>
    
   </form>
  </tr></table>';*/
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$prix = 500;
$dompdf->loadHtml('<nav>
<h1>AIM</h1>

</nav>
<head>

<head>
    <br>
    <br>
    <br>
        <h1>Recu</h1>
   
</head> 
  


<br>
<div>
  <label for ="ID_ACHAT:">ID_ACHAT:'.$prix.'
</label>
</br>
<br>
  <label for ="TITRE:">TITRE:'.$prix.'
</label>
</br>
<br>
  <label for ="prix Totale:">Prix Totale:'.$prix.'
</label>
</br>
 
  
</div>
<br>



</form>
');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>