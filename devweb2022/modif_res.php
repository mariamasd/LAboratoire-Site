<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifpatient</title>
</head>
<body>
    
<h1>modifier les informations</h1>
            <?php
            $c=null;$nom=null; $type=null;$statut=null;$dateanalyse=null;$adr=null;$tel=null;$em=null; ;$dp=null;$drv=null;$np=null;
            if(isset($_GET['idanalyse']))
            
<form action="secretaire.php" method="POST" >
<input type="hidden" value= "<?php echo $c;?>" name="idpatient">
            <label for="nom">Nom Analyse :</label>
            <input type="text" name="nomanalyse" id="nom"  value= "<?php echo $nom;?>"><br><br>
            <label for="pr">Type Analyse :</label>
            <input type="text" name="typeanalyse" id="pr"  value= "<?php echo $type;?>"><br><br>
            <label for="st"> Statut Analyse:</label>
            <label for="st"> Validee</label>
            <input type="radio" name="statutanalyse" id="st" value="validee"  value= "<?php echo $statut;?>">
            <label for="s"> En attentes</label>
            <input type="radio" name="statutanalyse" id="s" value="En attentes"  value= "<?php echo $statut;?>"><br><br>
            <label for="ad">Date analyse: </label>
            <input type="date" name="dateanalyse" id="ad"  value= "<?php echo $dateanalyse;?>"><br><br>
            <label for="pa">Patient</label>
    <select type="number" name="idpatient" id="pa" value= "<?php echo $c;?>">
    

<?php
$conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
if($conn)
{
            $sql = "SELECT * FROM patient";
}   
                    if($res = $conn->query($sql))
                    {
              foreach($res as $test)
           {
            echo '<option >'.$test['idpatient'].'</option>';
           }
//<option value='.$test['idtest'].'>'.$test['idtest'].'</option>';
        }
?> </select>
<input type="submit" value="ajouter">
</form>