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
<form action="commande_post.php" method="post">
    <section class="jumbotron">
        <div class="container">
            <h1 class="jumbotron-heading DecouvrezNosProduits text-center" >Finalisez votre paiement ! </h1></br>    
        </div>
    </section>
    <section>
        <div class="container">
            <div class ="col-lg-12" style="background-color:#668b22; border-radius:5px; ">
                <h3 class="text-center"style="color:white; padding-bottom:30px; padding-top:30px;">01. Recapitulatif de votre commande</h3>
                <div class="row mb-5" style=""> 
                <div class="col-lg-12" style="background-color:white;">
                    <div class="cart">
                    <div class="cart-wrapper">
                        <div class="cart-header text-center">
                        <div class="row ligne1" style="margin-bottom:10px;">
                            <div class="col-5">Produit</div>
                            <div class="col-2">Prix</div>
                            <div class="col-2">Quantitée</div>
                            <div class="col-2">Prix total</div>
                            <div class="col-1"></div>
                        </div>
                        </div>
                        <div class="cart-body">
                        <!-- Product-->
                        <?php  $count = 0; foreach($articles as $article): $total +=   $article['exemplaire'] * $article['prix'] ; $count+= $article['exemplaire']; ?>

                        <div class="cart-item">
                            <div class="row d-flex align-items-center text-center">
                            <div class="col-5">
                                <div class="d-flex align-items-center"><a href="detail.html"><img  width="200px" src="assets/images/articleImg/<?php echo $article['img']?>"></a>
                                <div class="cart-title text-left"><a class="text-uppercase text-dark" href="detail.html"><strong><?php echo $article['titre_article'] ?><?php echo $article['id'] ?></strong></a><br>
                                </div>
                                </div>
                            </div>
                            <div class="col-2"><?php echo $article['prix'] ."€" ?></div>
                            <div class="col-2">
                                <div class="d-flex align-items-center">
                                    <div class="col-2"><?php echo "x". $article['exemplaire'] ?></div>
                                </div>
                            </div>
                            <div class="col-2 text-center"><?php echo $article['exemplaire'] * $article['prix'] . "€"; ?></div>
                            <div class="col-1 text-center"><a class="cart-remove" href="delPanier.php?article=<?php echo $article['id'] ?>&exemplaire=<?php echo $article['exemplaire'] ?>"> <i class="fa fa-times"></i></a></div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        </div>
                        <h4 style="font-family:none;">Prix total de la commande : <b><?php echo $total  ?>€</b></h4>
                        
                    </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
    <section class=" ">
        <div class="container">
            <div class ="col-lg-12" style="background-color:#668b22; border-radius:5px; ">
                <h3 class="text-center"style="color:white; padding-bottom:30px; padding-top:30px;">02. Vos informations de livraison</h3>
                <div class="row mb-5" style=";"> 
                <div class="col-lg-12 text-center " style="background-color:white;">
                    <p>Votre Nom : <?php echo $_SESSION['nom']?> </p>
                    <p>Votre Prenom : <?php echo $_SESSION['prenom']?> </p>
                    <p>Votre numéro de téléphone : <?php echo $_SESSION['telnum']?> </p>
                    <p>Votre mail : <?php echo $_SESSION['email']?> </p>
                    <p>Votre adresse : <?php echo $_SESSION['adresse']?> </p>
                    <p>Votre Code postal : <?php echo $_SESSION['zip']?> </p>
                    <p>Votre Pays : <?php echo $_SESSION['country']?> </p>
                </div>  
                </div>
            </div>
        </div>
    </section>
    <section class=" ">
        <div class="container">
            <div class ="col-lg-12" style="background-color:#668b22; border-radius:5px; ">
                <h3 class="text-center"style="color:white; padding-bottom:30px; padding-top:30px;">03. Votre mode de livraison</h3>
                <div class="row mb-5" style=""> 
                <div class="col-lg-12 text-center" style="background-color:white;">
                <div class="form-group col-md-12 d-flex align-items-center">
                 <div class="col-6 col-xs-12">
                    <input type="radio" name="livraisonmode" id="option0" checked>
                    <label class="ml-6" for="option0"><strong class="d-block text-uppercase mb-2">Livraison gratuite </strong><span class="text-muted text-sm">Recevez vos produits sous 7 jours  .</span></label>
                 </div>
                 <div class="col-6 col-xs-12">
                    <input type="radio" name="livraisonmode1" id="option1">
                    <label class="ml-6" for="option0"><strong class="d-block text-uppercase mb-2">Livraison rapide ! (+4,99€)</strong><span class="text-muted text-sm">Recevez vos produits sous 48H !</span></label>
                  </div>
                </div>  
                </div>
            </div>
        </div>
    </section>
    <input hidden name="prix" value="<?php echo $total ; ?>">
    <input hidden name="nb_articles" value="<?php echo $count ; ?>">
    <input hidden name="statut" value="1">
    <input hidden name="idArticle" value="<?php echo $article['id'] ; ?>">
    <input hidden name="exemplaire" value="<?php echo $article['exemplaire'] ; ?>">

<div class="text-center">
    <button type="submit"> <img  src="assets\images\paypal.png" ></button>
</div>
</form>


<?php require_once('assets/include/footer.php');?>

