<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ecoservice;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$sql = "SELECT DISTINCT titre_article FROM article ";

// On prépare la requête
$query = $bdd->prepare($sql);

// On exécute la requête
$query->execute();

while($row = $query->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    $article = $titre_article;
    $tableauArticle[] = $article;
}


// On encode en json et on envoie
echo json_encode($tableauArticle);
