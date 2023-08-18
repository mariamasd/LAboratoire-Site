<!doctype html>
<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href ="style2.css">
    </head>
    <body>
    

    <?php
    // Connexion à la base de données
  $conn =  new PDO ("mysql:host=localhost;dbname=devweb2022","root","");    
// Vérifie si le formulaire a été soumis
  if (isset($_POST['submit'])) 
  {
// Récupère les données du formulaire
  $email = $_POST['email'];
  $motdepasse = $_POST['motdepasse'];



// Vérifie si les informations de connexion sont correctes
  $req1 = "SELECT * FROM administrateur WHERE email='$email' AND motdepasse='$motdepasse'";
   $res =$conn->query($req1);
 // $result = mysqli_query($conn, $query);
  if ($res->rowCount()>0) 
  {
// Démarre une nouvelle session
    session_start();
// Enregistre l'utilisateur en tant qu'étant connecté
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    //
    
  foreach($conn->query($req1) as $row){
    //echo $row['profile'];
    if($row['statut'] == "secretaire"){
      header("location:secretaire.php");
    }else{
      header("location:laborantin.php");
    }
  }
    
    exit;
  } 
  else 
  {
// Affiche un message d'erreur si les informations de connexion sont incorrectes
    $error = "Nom d'utilisateur ou mot de passe incorrect";
  }
}
?>
 
  <div class="wrapper">
        <div class="logo">
            <img src="assets/images/logo.jpeg" alt="">
        </div>
        <div class="text-center mt-4 name">
            VEUILLEZ-VOUS CONNECTER!
        </div>
        <form class="p-3 mt-3" form action='' method='POST'>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="ep" placeholder="Veuillez entrer votre email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="motdepasse" id="mp" placeholder="Veuillez entrer votre mot de passe">
            </div>
        
            <input class="btn mt-3" type='submit' name='submit' value='CONNECTER'/>
    
        </form>
        <div class="text-center fs-6">
        <a href="inscription.php">S’inscrire</a>
        </div>
    </div>
    

</body>
</html>


