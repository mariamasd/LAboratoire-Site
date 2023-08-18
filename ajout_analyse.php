<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>ajouter un patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>

    </style>
</head>
<body>
    <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">AJOUT D'UNE NOUVELLE ANALYSE</h3>
        </div>
        <div class="card-body">
        <div class="container mt-5">
        <form class="form" action="secretaire.php #dossiers_patient" method="POST" >
            <label for="nom">Nom Analyse :</label>
            <input class="form-control" type="text" name="nomanalyse" id="nom" placeholder="Nom Analyse">
            <label for="pr">Type Analyse :</label>
            <input class="form-control" type="text" name="typeanalyse" id="pr" placeholder="Type Analyse">
        <div>
            <label for="st"> Statut Analyse:</label>
            <label for="st"> Validee</label>
            <input type="radio" name="statutanalyse" id="st" value="validee">
            <label for="s"> En attentes</label>
            <input type="radio" name="statutanalyse" id="s" value="En attentes">
        </div>
            <label for="ad">Date analyse: </label>
            <input class="form-control" type="date" name="dateanalyse" id="ad">
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
<button type="submit" class="btn btn-primary mt-3"><span class="bi-pencil"></span>Ajouter</button>
</form>
        </div>
    </div>
    </div>
</body>
</html>