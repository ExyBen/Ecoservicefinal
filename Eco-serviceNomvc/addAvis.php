<?php 

if (!isset($_SESSION))
{
    session_start();
}
include('assets/include/connexionbdd.php');

$rate = $_GET['rate'];
$article = $_GET['article'];



$sql = "SELECT COUNT(Nottation) FROM note WHERE idUser = :iduser AND idArticle = :idArticle";

$count = $bdd->prepare($sql);
$count->bindParam(':iduser',$_SESSION['id']);
$count->bindParam(':idArticle',$article);
$count->execute();
$res = $count->fetch();

if($res[0] == 0)
    $sql = "INSERT INTO note ( idArticle, idUser, Nottation) VALUES ( :idArticle , :iduser , :rate )";
else 
    $sql = "UPDATE note set Nottation = :rate WHERE idUser = :iduser AND idArticle = :idArticle";

$exec = $bdd->prepare($sql);
$exec->bindParam(":rate", $rate);
$exec->bindParam(":iduser", $_SESSION['id']);
$exec->bindParam(":idArticle", $article);

if($exec->execute())
    $msg = "Votre vote a bien été créé ou modifié";
else 
    $msg = "Votre vote n'a pas pu etre créé ou modifié";



    include("product.php");