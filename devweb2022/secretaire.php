<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

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
                        <li><a href="#dossier_patient">PATIENTS</a></li>
                        <li><a href="#analyse_patient">ANALYSES</a></li> 
                        <li><a href="#resultat_patient">RESULATS</a></li>
                       
                        
    
                        </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block appoint">
                        <button class="btn btn-info"><a href="patient.php">AJOUTER UN PATIENT</a></button>
                    </div>
                </div>

            </div>
        </div>
    
        <section id="dossier_patient">
            <h1>LISTE DES PATIENTS LABIO7/7</h1>
            <form action="secretaire.php" method="POST">
                  <input type="text" name="search" placeholder="Rechercher">
                  <input type="submit" value="rechercher">
                </form>
            <?php
            if(isset($_POST["sexepatient"]))
            { 
           if(isset($_POST["sexepatient"]) and isset($_POST["nompatient"]) and isset($_POST["prenompatient"]) and isset($_POST["datenaisspatient"]) and isset($_POST["adressepatient"]))
           {
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
          
    
        
           }
           $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
        
           echo "<br>";
           $req1 = "INSERT INTO patient(sexepatient,nompatient,prenompatient,datenaisspatient,adressepatient,telpatient,emailpatient,dateenr,daterv,nationalitepatient)
           VALUES('$sexe', '$nom','$pre','$datnais','$adr','$tel','$em','$dp','$drv','$np')";
           $res = $conn->exec($req1);
        }
           ?>
<?php
$req2="select * from patient order by nompatient, prenompatient";
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
if(!empty($_POST['search']))
{
    $r=$_POST['search'];
$req2="select * from patient where nompatient  like '%$r%'";
}
$res=$conn->query($req2);
if($res)
{
        echo "<table class='table table-striped table-bordered'  id='non'>";
        echo "<tr>";
        echo" <th> idpatient </th>";
        echo "<th> sexe </th>";
        echo" <th>Nom </th>";
        echo"<th> Prenom </th>";
        echo" <th> Date Naissance </th>";
        echo" <th>Adresse </th>";
        echo " <th>Tel </th>";
        echo " <th> Email</th>";
        echo" <th>Date Enregistrement </th>";
        echo" <th>Date RV </th>";
        echo" <th> Nationalite</th>";
        echo" <th> Action1 </th>";
        echo" <th> Action2 </th>";
echo"</tr>";
while($table = $res->fetch(PDO::FETCH_ASSOC))
{
echo" <tr>";

foreach($table as $cellule)
{
  echo "<td>$cellule</td>";
}
$c=$table['idpatient'];
echo"<td> <a class='btn btn-primary' href='modifpatient.php? idpatient=$c'> <span class='bi-pencil'></span> Modifier</a></td>";
echo"<td><a class='btn btn-danger' href='suppatient.php? idpatient=$c'><span class='bi-x'></span> Supprimer </a> </td>";
echo "</tr>";
}

 echo "</table>";
}
    
?>
    </section>
<section id="analyse_patient">
 <h1>LES ANALYSES DES PATIENTS</h1>
 <button> <a href="ajout_analyse.php"> ajouter des analyses </a></button>
 <div>
 <?php
 $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
 if(isset($_POST["nomanalyse"]))
 {
     if((isset($_POST["nomanalyse"])) and 
     isset($_POST["typeanalyse"]) and isset($_POST["statutanalyse"]) and isset($_POST["dateanalyse"])) 
         {
        
         $idp = $_POST["idpatient"];
         $nom = $_POST["nomanalyse"];
         $type = $_POST["typeanalyse"];
         $statut = $_POST["statutanalyse"];
         $dateanalyse =$_POST["dateanalyse"];
 
             $sql = "INSERT INTO analyses(idpatient,nomanalyse,typeanalyse, statutanalyse,dateanalyse)
              VALUES ($idp,'$nom','$type','$statut','$dateanalyse')";
 
             $conn->exec($sql);
            
         }
        }
 ?>
<?php
           $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
           if($conn)
           {

           $req6 = "select * from analyses ";
           }
           $sql = $conn->query($req6);
echo '<table class="table table-striped table-bordered">';
echo '<tr><th>idanalyse</th> <th>idpatient</th><th>nomanalyse</th><th>typeanalyse</th><th>statutanalyse</th><th>dateanalyse</th><th>Actions</th></tr>';
while ($row = $sql->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['idanalyse'] . '</td>';
    echo '<td>' . $row['idpatient'] . '</td>';
    echo '<td>' . $row['nomanalyse'] . '</td>';
    echo '<td>' . $row['typeanalyse'] . '</td>';
    echo '<td>' . $row['statutanalyse'] . '</td>';
    echo '<td>' . $row['dateanalyse'] . '</td>';

    $c=$row['idanalyse'];
    echo '<div class="btn">';
    echo" <td> <a class='btn btn-primary' href='modifanalyse.php? idanalyse=$c' > Editer </a>";
    echo"<a class='btn btn-danger' href='suppanalyse.php? idanalyse=$c'>suprimer </a> </td>";
    echo '</div>';
    echo "</tr>";
}
 echo "</table>";
  ?>
 </div>
</section>
 <section id="resultat_patient">
  <h1>resultat analyses</h1>
  <form action="secretaire.php" method="POST">
                  <input type="text" name="search" placeholder="Rechercher">
                  <input type="submit" value="rechercher">
                </form>
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
           $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
if(!empty($_POST['search']))
{
    $s=$_POST['search'];
$req4="Select  p.idpatient, p.prenompatient , p.nompatient , a.nomanalyse , a.typeanalyse ,a.statutanalyse ,a.dateanalyse ,r.Resultat 
FROM patient p, analyses a, resultat_analyse r
WHERE p.idpatient =a.idpatient 
AND  a.idanalyse = r.idanalyse 
AND a.statutanalyse='validee'
AND Resultat  like '%$s%'";
}
$sql=$conn->query($req4);
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



         </section>


         <section>

         </section>
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