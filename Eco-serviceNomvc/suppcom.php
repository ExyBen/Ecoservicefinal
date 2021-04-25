<?php
session_start();
    include('assets/include/connexionbdd.php');

    

    $query = $bdd->prepare('DELETE FROM commentaire WHERE id = ?');
    $query->execute(array($_POST['id']));
    header('Location: product.php?article='.$_POST['idArticle']); // redirection vers cours.php
    exit();


    ?>
