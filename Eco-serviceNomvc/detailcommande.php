
<?php 
    if (!isset($_SESSION))
    {
        session_start();
    }
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 

$req = $bdd->prepare('SELECT * FROM detailcommande WHERE idCommande = ?');
$req->execute(array($_GET['idCommande']));
 $donnees = $req->fetch();
    // si il n'ya pas de donnee on echo pas d'article au sinon on affiche la page JUSQUA
     if(!$donnees){
         echo "Commande inexistante";
        
     } else {
?>







<?php } ?>