<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Identifant_labo</title>

</head>
<body>
    <header>
        <div>
            <img src="image/logo.JPEG" width="70px" height="70px" alt="logo"/>
        </div>
        <div>
            <h1 id="title"> IDENTIFIEZ-VOUS </h1>
        </div>
    <div>
                <h3>IDENTIFIER VOUS</h3>
            </div>
            <div>
                <form action="laborantin.php" method="post">
                    <label for="nom">nom d'utilisateur</label>
                <input type="email"  name="nom" id="nom">
                    <label for="mdp">Mots de passe</label>
                        <input type="password" name="password" id="mdp">
                        <input type="submit" value="se connecter">
                    </div>
                </form>
             <?php
                $n=$_POST['nom'];
                $mp=$_POST['password'];
                $nom="laborantin@gmail.com";
                $mdp="labbio77"; 
                $reussi="";
                $erreur="";
        if($n==$nom&& $mp==$mdp)
        {
            $reussi="Authentification reussi";
            header("location:laborantin.php");
        }
        else
        {
        $erreur="utilisateur inconnu";
        header("location:identification_labo.php");
        }
                ?>
</body>
</html>