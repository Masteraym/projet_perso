<?php
include("./inc/constants.inc.php");

// // Traitement du formulaire de réservation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire  
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $tel = htmlspecialchars($_POST['tel']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

//     // Validation des données
  
    $errors = [];
    // Validation du prénom
      if (empty($prenom)) {
        $errors['prenom'] = "Veuillez entrer votre prénom.";
    } elseif (!preg_match('/^[A-Za-z]{3,}+$/', $prenom)) {
        $errors['prenom'] = "Le prénom doit contenir au moins 3 lettres et ne doit pas contenir de caractères spéciaux.";
    }

    // Validation du nom
    if (empty($nom)) {
        $errors['nom'] = "Veuillez entrer votre nom.";
    } elseif (!preg_match('/^[A-Za-z]{3,}+$/', $nom)) {
        $errors['nom'] = "Le nom doit contenir au moins 3 lettres et ne doit pas contenir de caractères spéciaux.";
    }

    // Validation du numéro de téléphone
    if (empty($tel)) {
        $errors['tel'] = "Veuillez entrer votre numéro de téléphone.";
    } elseif (!preg_match('/^(?:(?:\+|00)33|0)[1-9][0-9]{8}$/', $tel)) {
        $errors['tel'] = "Le numéro de téléphone doit être au format français valide.";
    }

    // Validation de l'e-mail
    if (empty($email)) {
        $errors['email'] = "Veuillez entrer votre adresse e-mail.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse e-mail n'est pas valide.";
    }
    // Validation du pass
    if (empty($pass)) {
        $errors['pass'] = "Veuillez entrer votre mot de passe .";
    } elseif (!preg_match('/^[A-Za-z0-9_$]{8,}/', $pass)) {
        $errors['pass'] = "Le pass n,est pas validé";
    }


    // Si des erreurs sont présentes, afficher les erreurs
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>" . htmlspecialchars($error) . "</p>";
        }
    } else {
        // Si toutes les données sont valides
        // Effectuer les actions nécessaires, par exemple, enregistrer les données dans une base de données ou envoyer un e-mail de confirmation

        // Rediriger l'utilisateur vers une autre page après le traitement du formulaire
        header("Location: index.php");
        exit();
    }
}
// Hash the password
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
include_once("./inc/constants.inc.php");

try {
    // Connexion à la BDD
    $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    // Options
    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Teste si l'email n'existe pas déjà
    $sql = 'SELECT COUNT(*) AS nb FROM formsignup WHERE email=?'; // paramètre anonyme
    $qry = $cnn->prepare($sql); // prépare la requête
    $qry->execute(array($email));
    $row = $qry->fetch();


    if ($row['nb'] == 1) {
        echo '<h2 class="reponse_mailexiste">Cet email existe déjà !';
        echo '<a href="index.php">Retour à l\'accueil</a>';
    } else {
        $sql = 'INSERT INTO formsignup(prenom, nom,  tel, email, pass) VALUES(:prenom ,:nom, :tel, :email, :pass)';
        $qry = $cnn->prepare($sql);

        $params = [
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':tel' => $tel,
            ':email' => $email,
            ':pass' => $pass,
        ];

        $qry->execute($params);
        $qry = null; // Ferme le curseur de la requête
        $cnn = null; // Ferme la connexion à la base de données

        echo '<h2 class="reponse_mailexiste">Vous êtes bien inscrit ';
        echo '<a href="PageConnection.php">Retour à la page de connexion</a>';
    }
} catch (PDOException $ex) {
    $errorMessage = $ex->getMessage();
    $_SESSION["compte-erreur-sql"] = $errorMessage;
    $_SESSION["compte-donnees"]["prenom"] = $prenom;
    $_SESSION["compte-donnees"]["nom"] = $nom;
    $_SESSION["compte-donnees"]["tel"] = $tel;
    $_SESSION["compte-donnees"]["email"] = $email;
    $_SESSION["compte-donnees"]["pass"] = $pass;
 
    exit;
}

?>

