<?php
// Connexion à la base de données
session_start();

include('assets/include/connexionbdd.php');
// Insertion du message à l'aide d'une requête préparée
$datimer=date ("Y-m-d H:i:s");
if(isset($_POST['prix']) AND isset($_POST['nb_articles']) AND isset($_POST['statut']) AND isset($_POST['idUser'])){

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commande (prix,nb_articles,date_commande,statut,idUser) VALUES(?,?,?,?,?)');

// les points d'interrogation sont rempli quand on execute
$req->execute(array($_POST['prix'], $_POST['nb_articles'], $datimer,$_POST['statut'],$_SESSION['id']));
var_dump($_POST['prix'],$_POST['nb_articles'], $datimer,$_POST['statut'],$_SESSION['id']);

// Redirection du visiteur vers la page du minichat
}else{
    var_dump($_POST['prix'],$_POST['nb_articles'], $datimer,$_POST['statut'],$_SESSION['id']);
}
?>