<?php 

    
    session_start();

include('assets/include/connexionbdd.php');

$req = $bdd->prepare('SELECT * FROM `article` WHERE titre_article =?'); 
$req->execute(array($_POST['article']));
$search = $req->fetch();
header('Location: product.php?article='.$search['id']);