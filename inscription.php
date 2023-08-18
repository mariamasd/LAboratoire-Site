<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PAGE D'ACCEUIL</title>
		<link rel="stylesheet" href ="styleacceuil.css">
      <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="container admin mt-5">
            <div class="row">
                <h1 class="text-center"><strong>VEUILLEZ VOUS INSCRIRE</strong></h1>
                <br>
                <form class="form" method="POST" action="trait_ins.php">
                    <br>
                    <div class="mt-3">
                        <label class="form-label" for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="prenom">Prenoms:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenoms">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="email">Email:</label>
                        <input type="text" name="email" class="form-control" id="prenom" placeholder="Email">
                    </div>
                     <div class="mt-3">
                        <label class="form-label" for="motdepasse">Mot de passe:</label>
                        <input type="password" name="motdepasse" class="form-control" id="prenom" placeholder="Mot de passe">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="email">Confirmation mot de passe:</label>
                        <input type="password" name="confirmmotdepasse" class="form-control" id="prenom" placeholder="Confirmation">
                    </div>
                    <div>
                        <label class="form-label" for="email">Telephone:</label>
                        <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone">
                    </div>
                    <br>
                    <div class="mt-3">
                        <label class="form-label" for="category">Statut Administrateur:</label>
                        <select class="form-control" id="category" name="statut" id='st'>
                            <option value='secretaire'>SECRETAIRE</option>
	                          <option value='laborantin'>LABORANTIN</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="bi-pencil"></span>Ajouter</button>
                        <a class="btn btn-primary" href="#"><span class="bi-arrow-left"></span>ANNULER</a>
                   </div>
                </form>
            </div>
      </div>
  <?php
// Vérifiez que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    // Récupérez les données du formulaire
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    $confirmmotdepasse = $_POST['confirmmotdepasse'];
    $telephone= $_POST['telephone'];
    $statut= $_POST['statut'];

  
    // Vérifiez que les champs du formulaire ont été remplis
    if (empty($nom) || empty($prenom) || empty($email) || empty($motdepasse)|| empty($confirmmotdepasse)|| empty($telephone)|| empty($statut)) 
    {
      $error = "Tous les champs sont obligatoires.";
    }
    // Vérifiez que le mot de passe et sa confirmation sont identiques
    elseif ($motdepasse!= $confirmmotdepasse) 
    {
      echo "Les mots de passe ne correspondent pas.";
    }
    // Si les données sont valides, inscrivez l'utilisateur
    else
     {
      // Hash the password
     // $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);
    //connexion a la base de donnee
    $conn= new PDO("mysql:host=localhost;dbname=devweb2022","root","");
    if($conn)
    {
         echo "connection reussi";
    }
    else
    {
     echo "connection pas reussi";
    }
      // Insert the new user into the database
      $req1= "INSERT INTO administrateur (nom,prenom,email,motdepasse,telephone,statut) VALUES ('$nom','$prenom','$email','$motdepasse','$telephone','$statut')";
      $res = $conn->exec($req1);
     
  
      // Redirect the user to the login page
      //header('Location: login.php');
      //exit;
     // $res = $conn->exec($req1);
           if($res)
           {
            echo "insertion reussi";
            header("location:connection.php");
           }
           else
           {
            echo "insertion pas reussi";
           }
    }
  }

?>
</form>
</body>
</html>



