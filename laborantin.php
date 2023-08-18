<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dossiers secrétaire</title>
    <!-- <link rel="stylesheet" href="style.css"> -->

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <style>
          form
          {
            padding: 5px;
            margin:5px;
          }
            table,td,th
{
  border:1px solid black;
}
table
{
  border-collapse:collapse;

  }
  form
  {
    margin-left:20%;
    color:aqua;
    
  }
  input,textarea,select
  {
    border:1px solide black;
    border-radius:5px;
    box-shadow: 1px 1px 1px blue;
    background:white;
   
  }
  *
  {
  /* background-image:url("imagelog.jpeg"); */
background-repeat:no-repeat; 
background-attachment: fixed;
background-size:150%;
padding: 10px;
/* color:blue;  */
}
label,input
{
  color:black;
weight:20px;
display:inline-block;
}
.titre
 {
  text-align:center;
font-size 50px;
 } 
 h2
 {
  weight: 15px;
  font-family:bold;
 }
        </style>

</head>
<body>

    <!-- ################# Header Starts Here#######################--->
    <header>
       
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 no-padding col-sm-12 nav-img">
                        <img src="assets/images/logo.jpeg" alt="">
                       <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                    <ul>
                        <li><a href="acceuil.php">HOME</a></li>
                        <li><a href="#analyse_patient"> ANALYSES EN ATTENTE</a> </li>
                        <li><a href="#resultat_analyse_patient"> RESULTAT ANALYSES </a> </li>
                       
                        
    
                        </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block appoint">
                        <button class="btn btn-info"><a href="sasir_analyse.php">saisir les resultat</a></button>
                    </div>
                </div>

            </div>
        </div>
    <main>
<section id='analyse_patient'>
<?php
// Établissez une connexion à la base de données

$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");

$query =("Select a.idanalyse,p.nompatient, p.prenompatient, a.nomanalyse, a.typeanalyse,a.statutanalyse,a.dateanalyse FROM patient p, analyses a WHERE p.idpatient =a.idpatient AND a.statutanalyse='En attentes'");
$sql=$conn->query($query);
echo '<table>';
echo '<tr><th>idanalyse</th><th>nompatient</th><th>prenompatient</th><th>nomanalyse</th><th>typeanalyse</th><th>statutanalyse</th><th>dateanalyse</th></tr>';
while ($row = $sql->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['idanalyse'] . '</td>';
    echo '<td>' . $row['nompatient'] . '</td>';
    echo '<td>' . $row['prenompatient'] . '</td>';
    echo '<td>' . $row['nomanalyse'] . '</td>';
    echo '<td>' . $row['typeanalyse'] . '</td>';
    echo '<td>' . $row['statutanalyse'] . '</td>';
    echo '<td>' . $row['dateanalyse'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>

</section>
<section id='resultat_analyse_patient'>
<?php
// Établissez une connexion à la base de données 
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");

if(isset($_POST["resultat"]))
 {
if(isset($_POST["idanalyse"]) and isset($_POST["resultat"]))
{
    $idanalyse = $_POST["idanalyse"];
    $resultat = $_POST["resultat"];
        $sql = "INSERT INTO resultat_analyse(idanalyse,resultat)
         VALUES ('$idanalyse','$resultat')";

        $query= $conn->exec($sql);
       
    }
   }
   ?>
   <?php
           $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
           if($conn)
           {

            $req4 = "Select  p.idpatient, p.prenompatient , p.nompatient , a.nomanalyse , a.typeanalyse ,a.statutanalyse ,a.dateanalyse ,r.Resultat 
            FROM patient p, analyses a, resultat_analyse r
            WHERE p.idpatient =a.idpatient 
            AND  a.idanalyse = r.idanalyse 
            AND a.statutanalyse='validee'";
           }
           $sql = $conn->query($req4);
           echo '<table>';
echo '<tr><th>idpatient</th><th>prenompatient</th><th>nompatient</th> <th>nomanalyse</th><th>typeanalyse</th><th>statutanalyse</th><th>dateanalyse</th><th>Resultat</th></tr>';
while ($row = $sql->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['idpatient'] .'</td>';
    echo '<td>' . $row['prenompatient'] .'</td>';
    echo '<td>' . $row['nompatient'] .'</td>';
    echo '<td>' . $row['nomanalyse'] .'</td>';
    echo '<td>' . $row['typeanalyse'] .'</td>';
    echo '<td>' . $row['statutanalyse'] . '</td>';
    echo '<td>' . $row['dateanalyse'] . '</td>';
    echo '<td>' . $row['Resultat'] . '</td>';

    echo '</tr>';
}
echo '</table>';
           ?>
    <?php
 /*$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
$req6="UPDATE analyses INNER JOIN resultat_analyse
on analyses.idanalyse=resultat_analyse.idanalyse
SET analyses.statutanalyse = 'validee' 
WHERE resultat_analyse.Resultat in ('positif', 'negatif') and analyses.statutanalyse='En attentes'";
$conn->exec($req6);*/


$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
$req6="UPDATE analyses INNER JOIN resultat_analyse
on analyses.idanalyse=resultat_analyse.idanalyse
SET analyses.statutanalyse = 'validee' 
WHERE resultat_analyse.Resultat in ('positif', 'negatif')";
$sql=$conn->exec($req6);

?>
</section>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h2>A propos</h2>
                    <p>
                    LABIO7/7 fait parti des premiers laboratoires certifiés ISO au SENEGAL. Avec notre équipe, nous réalisons des analyses biomique, hématologique, bactériologique, anatomo-pathologique parasito-mycologue et sero-immunologique.
</p>
                 
                </div>
                <div class="col-md-4 col-sm-12">
                    <h2>Nous joindre</h2>
                    <ul class="list-unstyled link-list">
                        <li><a ui-sref="about" href="#/about">A propos</a><i class="fa fa-angle-right"></i></li>
      
                        <li><a ui-sref="gallery" href="#/gallery">Photos</a><i class="fa fa-angle-right"></i></li>
                        <li><a ui-sref="contact" href="#/contact">Contact</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12 map-img">
                    <h2>Nos contact</h2>
                    <address class="md-margin-bottom-40">
                        Avenue Cheikh Anta Diop <br>
                        Point E, Dakar <br>
                        Téléphone: +221 338333333 <br>
                        Email: <a href="mailto:info@anybiz.com" class="">LABIO@gmail.com</a><br>
                        Site web: <a href="acceuil.php" class="">www.LABIO7/7.com</a>
                    </address>

                </div>
            </div>
        </div>
        

    </footer>
    <div class="copy">
            <div class="container">
                <a href="https://www.labaraka.com/">2022 &copy; Tous droits réservés à LABIO7/7</a>
                
                <span>
                <a><i class="fab fa-github"></i></a>
                <a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a>
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook-f"></i></a>
        </span>
            </div>

        </div>
    
    </body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>

<script src="assets/js/script.js"></script>


</html>