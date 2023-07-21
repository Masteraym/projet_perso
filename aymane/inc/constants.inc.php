<?php
// Active la gestion des erreurs
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
// ini_set('log_errors', '0');
// ini_set('error_log', './');

// // Selon la structure d'accueil de l'appli, on adapte 
// // les constantes de connexion à la BDD
// switch ($_SERVER['HTTP_HOST']) {
//     case 'localhost':
//         define('HOST', 'localhost');
//         define('PORT', 3306);
//         define('DATA', 'nogentg1');
//         define('USER', 'root');
//         define('PASS', '');
//         break;
//     case 'baobab-svr5': // Fictif
//         define('HOST', 'baobab-svr5');
//         define('DATA', 'baobab-sql5');
//         define('USER', 'baobab-usr1');
//         define('PASS', 'aR5*hgt+7uIopp$');
//         break;
//     default:
//         // do nothing
// }

//pour se connecter

$db_host = "localhost";
$db_name = "nogentg1";
$db_user = "root";
$db_pass = "";

$pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);

// Afficher les erreurs PDO
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>

