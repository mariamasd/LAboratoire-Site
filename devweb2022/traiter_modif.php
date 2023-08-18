<?php
        $c=$_POST['idpatient'];
        $sexe=$_POST['sexepatient'];
        $nom=$_POST['nompatient'];
        $pre=$_POST['prenompatient'];
        $datnais=$_POST['datenaisspatient'];
        $adr=$_POST['adressepatient'];
        $tel=$_POST['telpatient'];
        $em=$_POST['emailpatient'];
        $dp=$_POST['dateenr'];
        $drv=$_POST['daterv'];
        $np=$_POST['nationalitepatient'];
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
$req="update patient set sexepatient='$sexe',nompatient='$nom',prenompatient='$pre',datenaisspatient='$datnais',adressepatient='$adr',telpatient='$tel',emailpatient='$em', dateenr='$dp',daterv='$drv',nationalitepatient='$np'where idpatient=$c";
$conn->exec($req);
header("location:secretaire.php#non");
?>