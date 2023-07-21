<?php

include("inc/constants.inc.php");
// vérification du jeton de CSRF envoyé

$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

session_start();
// initialisation du tableau d'erreur
$erreurs = [];

// Validation du nom
if (preg_match("/^[A-Za-z]+$/", $nom) === 0) {
  $erreurs["nom"] = "Le nom n'est pas valide";
}
// vérification de l'email
if (preg_match("/^[A-Za-zÀ-ú]{1,}@[A-Za-zÀ-ú]{1,}\.[A-Za-zÀ-ú]{1,}$/", $mail) === 0) {
  // ajout d'un message d'erreur
  $erreurs["mail"] = "L'email n'est pas valide";
}
// valider $pass
if (preg_match("/^[A-Za-z0-9_$]{8,}$/", $pass) === 0) {
  // ajouter un message d'erreur dans le tableau $erreurs
  $erreurs["pass"] = "Le mot de passe n'est pas valide";
}

// mettre en place une protection XSS
$nom = htmlspecialchars($nom);
$mail = htmlspecialchars($mail);
$pass = htmlspecialchars($pass);


// si des erreurs sont présentes, rediriger vers la page du formulaire
if (count($erreurs) > 0) {
  $_SESSION["compte-donnees"]["nom"] = $nom;
  $_SESSION["compte-donnees"]["mail"] = $mail;
  $_SESSION["compte-donnees"]["pass"] = $pass;
  $_SESSION["compte-erreurs"] = $erreurs;
  echo '<h2 class="reponse_mailexiste">Vous n\'avez pas rempli tous les champs.</h2>';
  // echo '<a href="compte.php">Retour à l\'accueil</a>';
  exit;
}

// parcourir les données postées
$params = [];
foreach ($_POST as $key => $val) {
  $params[':' . $key] = (isset($_POST[$key]) && !empty($_POST[$key])) ? htmlspecialchars($_POST[$key]) : null;
}

// cryptage de l'email et du mot de passe
$params[':pass'] = sha1(md5($params[":pass"]) . md5($params[':pass']));

include("inc/constants.inc.php");
// connexion à la base de données
try {
  // Connexion à la BDD
  $cnn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
  // Options
  $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  // Vérifier si l'adresse email n'existe pas déjà
  $sql = 'SELECT COUNT(*) AS nb FROM clients WHERE mail=?'; // paramètre anonyme
  $qry = $cnn->prepare($sql); // préparer la requête
  $qry->execute(array($params[':mail']));
  $row = $qry->fetch();
  // var_dump($row);
  if ($row['nb'] == 1) {
    echo '<h2 class="reponse_mailexiste">Cette adresse e-mail existe déjà !</h2>';
    echo '<a href="compte.php">Retour à l\'accueil</a>';
    //  header("location:compte.php");
  } else {
    $sql = 'INSERT INTO clients(nom, mail, pass) VALUES(:nom, :mail, :pass)';
    $qry = $cnn->prepare($sql);
    $qry->execute($params);
    unset($cnn); // déconnexion
    // header('location:login.php?m=inscription');
    // header('location:textes.php');
    echo '<h2 class="reponse_mailexiste">Vous êtes bien inscrit.</h2>';
    echo '<a href="compte.php">Retour à la page de connexion</a>';
    //  header('location:textes.php');
  }
} catch (PDOException $err) {
  $err->getMessage();
  /* dodif */
  $_SESSION["compte-erreur-sql"] = $err->getMessage();
  $_SESSION["compte-donnees"]["nom"] = $nom;
  $_SESSION["compte-donnees"]["mail"] = $mail;
  $_SESSION["compte-donnees"]["pass"] = $pass;
  
  //  header("location: compte.php");//redirection avec le code HTTP 302
  exit;
}
?>