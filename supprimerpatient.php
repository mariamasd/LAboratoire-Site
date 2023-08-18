<?php
$c=$_POST['idpatient'];
// $sexe=$_POST['sexepatient'];
// $nom=$_POST['nompatient'];
// $pre=$_POST['prenompatient'];
// $datnais=$_POST['datenaisspatient'];
// $adr=$_POST['adressepatient'];
// $tel=$_POST['telpatient'];
// $em=$_POST['emailpatient'];
// $dp=$_POST['dateenr'];
// $drv=$_POST['daterv'];
// $np=$_POST['nationalitepatient'];
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
$req= "delete from patient where idpatient = '$c'";
$res=$conn->exec($req);
if($res)
{
    echo"supression reussi";
}
else
{
    echo"pas reussi";

}
header("location:secretaire.php");
?>