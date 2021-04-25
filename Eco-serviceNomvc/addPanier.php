<?php
    include('assets/include/connexionbdd.php');
    if (!isset($_SESSION))
{
    session_start();
}
    $id_article = $_POST['id_article'];
    if(!empty($_POST['exemplaire'])){
        $exemplaire = $_POST['exemplaire'];
        $sql = "INSERT INTO panier (idUser, idArticle, exemplaire) VALUES ( :iduser, :idarticle,  :exemplaire);";
    }else
        $sql = "INSERT INTO panier (idUser, idArticle, exemplaire) VALUES (:iduser, :idarticle, 1);";

    $panier = $bdd->prepare($sql);
    $panier->bindParam(':iduser',$_SESSION['id']);
    $panier->bindParam(':idarticle',$id_article);
    if(!empty($_POST['exemplaire']))
        $panier->bindParam(':exemplaire',$exemplaire);
   
    $check = $panier->execute();
    var_dump($check);
    $redirection = $_GET['link'];
    if($check)
        $msg = "Votre article a bien été ajouté à votre panier !";
    else
        $msg = "Votre article n'a pas pu être ajouté";

    $_GET['article'] = $id_article;
    if($redirection == 'allProducts')
        include('allProducts.php');
    if($redirection == 'product')
        include("product.php");
    if($redirection == 'accueil')
        include("accueil.php");


    
