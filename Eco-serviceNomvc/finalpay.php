<?php 
if (!isset($_SESSION))
{
    session_start();
}
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 
$sql = "SELECT * FROM panier LEFT JOIN article ON panier.idArticle = article.id  WHERE panier.idUser = :iduser";

$panier = $bdd->prepare($sql);
$panier->bindParam(':iduser', $_SESSION['id']);
$panier->execute();
$articles = $panier->fetchall();
$total = 0;

?>

<section class="jumbotron">
    <div class="container">
        <h1 class="jumbotron-heading DecouvrezNosProduits text-center" >Finalisez votre paiement ! </h1></br>    
    </div>
</section>
<section class="container w-100  col-lg-4 col-10  ">
        <div class="row chooseLog">
            <a class="col-12 text-center justify-content-around itemConnec" id="selectConnexion" >Recapitulatif de votre commande </a>
        </div>
        <div>
            <p>Votre Nom : <?php echo $_SESSION['nom']?> </p>
            <p>Votre Prenom : <?php echo $_SESSION['prenom']?> </p>
            <p>Votre numéro de téléphone : <?php echo $_SESSION['telnum']?> </p>
            <p>Votre mail : <?php echo $_SESSION['email']?> </p>
            <p>Votre mail : <?php echo $_SESSION['email']?> </p>
            <p>Votre adresse : <?php echo $_SESSION['adresse']?> </p>
            <p>Votre C : <?php echo $_SESSION['email']?> </p>
            <p>Votre mail : <?php echo $_SESSION['email']?> </p>

        </div>  
</section>
