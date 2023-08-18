<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>sasir les resultats</title>
</head>
<body>
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="text-center">AJOUT DES RESULTATS DES ANALYSES</h3>
        </div>
        <div class="card-body">
        <div class="container">
    <form class="form" action="laborantin.php" method="POST">
        <label for="rs">RESULTAT</label>
            <label for="rs">positif</label>
            <input type="radio" name="resultat" id="rs" value="positif">
            <label for="rs">negatif</label>
            <input type="radio" name="resultat" id="rs" value="negatif"><br><br>
            <select type="number" name="idanalyse" id="pa">
    

            <?php
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
if($conn)
{
            $sql = "SELECT * FROM analyses";
}   
                    if($res = $conn->query($sql))
                    {
              foreach($res as $test)
           {
            echo '<option >'.$test['idanalyse'].''.$test['nomanalyse'].'</option>';
           }
//<option value='.$test['idtest'].'>'.$test['idtest'].'</option>';
        }
?>
</select>
<input type="submit"value="VALIDEZ">
    </form>
</div>
        </div>
    </div>
</body>
</html>