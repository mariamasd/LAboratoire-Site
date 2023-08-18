<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dossiers secrétaire</title>
    <link rel="stylesheet" href="css_secretaire.css">
</head>
    <header>
        <div>
        <img src="image/logo.JPEG" width="70px" height="70px" alt="logo"/>
        </div>
<nav>
    <ul>
        <li><a href="#resultat_patient"> RESULATS</a></li>
        <li> <a href="#analyse_patient">ANALYSES</a></li>
        <li><a href="#dossier_patients"> PATIENTS</a></li>
        <li><a href="patient.php">AJOUTER UN PATIENT</a></li>
       
    </ul>
</nav>
    </header>
    <main>
    
         <section id="analyse_patient">
 <h1>LES ANALYSES DES PATIENTS</h1>
 <h3> <a href="ajout_analyse.php"> ajouter des analyses </a></h3>
 <div>
 <?php
 if(isset($_POST["nomanalyse"]))
 {
    if(isset($_POST["nomanalyse"]) and isset($_POST["typeanalyse"]) and 
    isset($_POST["statut"]) and isset($_POST["dateanalyse"]))
    {
    $nom=$_POST['nomanalyse'];
    $t=$_POST['typeanalyse'];
    $st=$_POST['statut'];
    $date=$_POST['dateanalyse'];
    }
 $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
 if($conn)
 {
      echo "connection reussi";
 }
 else
 {
  echo "connection pas reussi";
 }

 
echo "<br>";
     
           $req="INSERT INTO 'analyses'(nomanalyse,typeanalyse,statut,dateanalyse)
           VALUES=('$nom','$t','$st','$d')";
           $res = $conn->exec($req);
           if($res)
           {
            echo "insertion reussi";
           }
           else
           {
            echo "insertion pas reussi";
           }
           }
           ?>
 </div>
</section>
 <section id="resultat_patient">

         </section>


         <section id="resultat_patient">

         </section>
    </main>
</body>
</html>