<?php
    include('assets/include/connexionbdd.php');

if (!isset($_SESSION))
{
    session_start();
} 


$id = $_GET['id'];

    $req = $bdd->prepare('UPDATE commande SET statut=2 WHERE id = ?');
    $req->execute(array($id));
    $messageSuccesArticleUpdate= "Statut de l'article mis à jour ! ";
    include("gestioncommandes.php"); 




