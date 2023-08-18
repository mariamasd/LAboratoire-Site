<?php
// $query = $_GET['search'];
// $sql = "SELECT * FROM patient WHERE nompatient LIKE '%$query%' OR prenompatient LIKE '%$query%'";
// $result = mysqli_query($conn, $sql);
// while ($row = mysqli_fetch_assoc($result)) {
//     echo "<h2>" . $row['nompatient'] . "</h2>";
//     echo "<p>" . $row['prenompatient'] . "</p>";
//   }
//   $req2="select * from patient order by type,nom";
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
if(!empty($_POST['search']))
{
$r=$_POST['search'];
$req2="select * from patient where nompatient like '%$r%'";
}


$res=$conn->query($req2);
if($res)
{
    echo "<table  id='non'>";
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
    echo"</tr>";
    while($table = $res->fetch(PDO::FETCH_ASSOC))
    {
    echo" <tr>";
    
    foreach($table as $cellule)
    {
      echo "<td>$cellule</td>";
    }
    }
}
     echo "</table>";    
    ?>