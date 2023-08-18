<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SUPPRESSION PATIENT</title>
        <style>
            input
            {
            background:red;
            }
        </style>
        </head>
        <body>
            <h1>suppression du produit</h1>
            <?php
           $c=$_GET['idpatient'];
            echo"$c";
             ?>
            <h2>Voulez vous suprimer</h2>
            <form action="supprimerpatient.php" method="POST">
            <input type="hidden" value= "<?php echo $c;?>"name="idpatient">
            <input type="submit" value="OUI">
           <button><a href="secretaire.php">NON</a></button> 
            </form>
        </body>
        </html>