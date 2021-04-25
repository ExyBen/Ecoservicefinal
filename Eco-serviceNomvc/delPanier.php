<?php
    include('assets/include/connexionbdd.php');

if (!isset($_SESSION))
{
    session_start();
} 


$article = $_GET['article'];
$exp = $_GET['exemplaire'];

$sql = "DELETE FROM panier WHERE idUser = :user AND idArticle = :article AND exemplaire = :exemplaire";

$panier = $bdd->prepare($sql);
    $panier->bindParam(':user',$_SESSION['id']);
    $panier->bindParam(':article',$article);
    $panier->bindParam(':exemplaire',$exp);
    $check = $panier->execute();

    if($check)
    $msg = "votre article a bien été supprimé";
else
    $msg = "votre article n'a pas pu être supprimé";


    include("panier.php");