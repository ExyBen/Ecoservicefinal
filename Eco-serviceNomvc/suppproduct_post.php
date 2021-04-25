<?php
session_start();
    include('assets/include/connexionbdd.php');

    

    $query = $bdd->prepare('DELETE FROM `article` WHERE `id` = ?');
    $query->execute(array($_POST['id']));
    header("Location: accueil.php"); // redirection vers cours.php
    exit();



    ?>