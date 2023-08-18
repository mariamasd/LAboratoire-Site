<?php
$c=$_POST['idpatient'];
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
$req= "delete from analyses where idanalyse = '$c'";
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