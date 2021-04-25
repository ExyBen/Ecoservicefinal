<?php
// Connexion à la base de données
session_start();

include('assets/include/connexionbdd.php');

// Insertion du message à l'aide d'une requête préparée
$datimer=date ("Y-m-d H:i:s");
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaire (texte,date_commentaire,idUser,idArticle) VALUES(?,?,?,?)');

// les points d'interrogation sont rempli quand on execute
$req->execute(array($_POST['texte'],$datimer, $_POST['id'], $_POST['id_article']));

// Redirection du visiteur vers la page du minichat
header('Location: product.php?article='.$_POST['id_article']);

?>