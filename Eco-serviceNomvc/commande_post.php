

<?php
// Connexion à la base de données
session_start();

include('assets/include/connexionbdd.php');

if($_POST['prix'] == "0" OR $_POST['nb_articles'] == "0"){
    header('Location:accueil.php');
}else{
// Insertion du message à l'aide d'une requête préparée
if(isset($_POST['livraisonmode']) AND $_POST['livraisonmode'] == "4,99"){
    $_POST['prix'] = $_POST['prix'] +4.99;
}
$datimer=date ("Y-m-d H:i:s");
if(isset($_POST['prix']) AND isset($_POST['nb_articles']) AND isset($_POST['statut'])){

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commande (prix,nb_articles,date_commande,statut,idUser) VALUES(?,?,?,?,?)');

// les points d'interrogation sont rempli quand on execute
$req->execute(array($_POST['prix'], $_POST['nb_articles'], $datimer,$_POST['statut'],$_SESSION['id']));
$lastId = $bdd->lastInsertId();


$req3 = $bdd->prepare('SELECT * FROM panier WHERE idUser = ?');
$req3->execute(array($_SESSION['id']));
$items = $req3->fetchAll();
foreach($items as $item):
    $req2 = $bdd->prepare('INSERT INTO detailcommande (idArticle,exemplaire,idCommande) VALUES(?,?,?)');
    $req2->execute(array($item['idArticle'], $item['exemplaire'], $lastId));
    
endforeach;

$query = $bdd->prepare('DELETE FROM panier WHERE idUser = ?');
$query->execute(array($_SESSION['id']));

header('location:https://www.paypal.com/paypalme/nathan93600.php');

// Redirection du visiteur vers la page du minichat
}else{
    
    $Erreurpaiement = "Une erreur à été rencontré lors de votre paiement, veuillez réessayer !";
    header('location:panier.php');

}
}
?>