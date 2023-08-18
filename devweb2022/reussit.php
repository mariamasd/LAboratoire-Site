<?php
// Vérifiez que le formulaire a été soumis
 if(isset($_POST["nom"]))
{
    // Récupérez les données du formulaire
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    $confirmmotdepasse = $_POST['confirmmotdepasse'];
    $telephone= $_POST['telephone'];
    $profile= $_POST['profile'];

  
    // Vérifiez que les champs du formulaire ont été remplis
    if (empty($nom) || empty($prenom) || empty($email) || empty($motdepasse)|| empty($confirmmotdepasse)|| empty($telephone)|| empty($statut)) {
      $error = "Tous les champs sont obligatoires.";
    }
    // Vérifiez que le mot de passe et sa confirmation sont identiques
    elseif ($motdepasse!= $confirmmotdepasse) {
      $error = "Les mots de passe ne correspondent pas.";
    }
    // Si les données sont valides, inscrivez l'utilisateur
    else
     {
      // Hash the password
      $motdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);
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
      $req1= "INSERT INTO administrateur (nom,prenom,email,motdepasse,telephone,profile) 
      VALUES ('$nom','$prenom','$email','$motdepasse','$telephone','$profile')";
    $res=$conn->exec($req1);
      
      // $stmt = $db->prepare($req1);
      // $stmt->bind_param('sss','$nom','$prenom','$email','$motdepasse','$telephone','$profile');
      // $stmt->execute();
  
      // Redirect the user to the login page
      //header('Location: login.php');
      //exit;
      // $res = $conn->exec($req1);
           if($res)
           {
            echo "insertion reussi";
           }
           else
           {
            echo "insertion pas reussi";
           }
    }
  }

?>