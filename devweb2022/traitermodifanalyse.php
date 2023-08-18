<?php
        $c=$_POST['idanalyse'];
        $nom=$_POST['nomanalyse'];
        $type=$_POST['typeanalyse'];
        $statut=$_POST['statutanalyse'];
        $dateanalyse=$_POST['dateanalyse'];
        $idp=$_POST['idpatient'];
        $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");

$req="update analyses set nomanalyse='$nom',typeanalyse='$type',statutanalyse='$statut',dateanalyse='$dateanalyse' where idanalyse='$c'";
$conn->exec($req);
header("location:secretaire.php");
?>