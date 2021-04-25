<?php include('assets/include/connexionbdd.php');
session_start();

// Suppression des variables de session et de la session

// $req2= $pdo->prepare('UPDATE membres SET is_connected = "0" WHERE pseudo= ?');
// $req2->execute(array($_SESSION['pseudo']));
$_SESSION = array();
session_destroy(); 
// setcookie('login', ''); //on detruit les cookies car on se deco
// setcookie('pass_hache', '');

header("location:accueil.php"); //ON DETRUIT LA SESSION ET REVIEN A INDEX.PHP
?>