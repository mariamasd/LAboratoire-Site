<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SUPPRESSION ANALYSE</title>
        <style>
            input
            {
            background:red;
            }
        </style>
        </head>
        <body>
            <h1>suppression de l'analyse</h1>
            <?php
            $c=$_GET['idanalyse'];
            echo"$c";
             ?>
            <h2>Voulez vous supprimer</h2>
            <form action="supprimeranalyse.php" method="POST">
            <input type="hidden" value= "<?php echo $c;?>"name="idpatient">
            <input type="submit" value="OUI">
           <button><a href="secretaire.php">NON</a></button> 
            </form>
        </body>
        </html>