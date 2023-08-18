<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
#formulaire
{
    border:1px solid black;
}
body
{
padding: 1px;
text-align: center;
background-repeat: repeat-y;
background-attachment: fixed;
background-image: url(fond.jpg);
background-size: cover;
font-size: 30px;
}
input
{
background-color: white;
text-align: center;
border-radius: 10px;
}
label
		{
			width:20%;
			display: inline-block;
			text-align: center;
        }

    </style>
    <title>modifanalyse</title>
</head>
<body>
    
<h1>MODIFIER LES INFORMATIONS</h1>
            <?php
            $c=null;$nom=null;$type=null;$statut=null;$dateanalyse=null;$idp=null;
            if(isset($_GET['idanalyse']))
            {
            $c=$_GET['idanalyse'];
            echo $c;
            $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
            if($conn)
            {
            $req="select * from analyses where idanalyse = $c ";
            $res=$conn->query($req);
            if($res)
            {
                $pat=$res->fetch();
                $nom=$pat['nomanalyse'];
                $type=$pat['typeanalyse'];
                $statut=$pat['statutanalyse'];
                $dateanalyse=$pat['dateanalyse'];
                $idp=$pat['idpatient'];
            }
            }
        }
        

?>


<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">AJOUT D'UNE NOUVELLE ANALYSE</h3>
        </div>
        <div class="card-body">
        <div class="container mt-5">
        <form class="form" action="traitermodifanalyse.php" method="POST" >
        <input type="hidden" value= "<?php echo $c;?>" name="idanalyse">
            <label for="nom">Nom Analyse :</label>
            <input class="form-control" type="text" name="nomanalyse" id="nom" placeholder="Nom Analyse" value="<?php echo $nom;?>">

            <label for="pr">Type Analyse :</label>
            <input class="form-control" type="text" name="typeanalyse" id="pr" placeholder="Type Analyse" value="<?php echo $type;?>">

        <div>
            <label for="st"> Statut Analyse:</label>
            <label for="st"> Validee</label>
            <input type="radio" name="statutanalyse" id="st" value="<?php echo" validee";?>" checked>
            <label for="s"> En attentes</label>
            <input type="radio" name="statutanalyse" id="s" value="<?php echo"En attentes";?>" checked>
        </div>
            <label for="ad">Date analyse: </label>
            <input class="form-control" type="date" name="dateanalyse" id="ad" value="<?php echo $dateanalyse;?>">
            <label for="pa">Patient</label>
            <select class="form-control" type="number" name="idpatient" id="pa">
    

<?php
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
if($conn)
{
            $sql = "SELECT * FROM patient";
}   
            if($res = $conn->query($sql))
            {
            
            foreach ($res as $row) {
            echo '<option value="'. $row['idpatient'] .'">'. $row['prenompatient'] .' '. $row['nompatient'] . '</option>';
            }
//<option value='.$test['idtest'].'>'.$test['idtest'].'</option>';
        }
?> 
</select>

<input type="submit" value="VALIDEZ">
<!--<button type="submit" class="btn btn-primary mt-3"><span class="bi-pencil"></span>MODIFIER</button>-->
</form>

        </div>
    </div>
    </div>
</body>
</html>