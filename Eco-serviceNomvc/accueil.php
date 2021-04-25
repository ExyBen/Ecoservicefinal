
<!-- Header -->
<?php 
 if (!isset($_SESSION))
 {
     session_start();
 }
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 
 if(!empty($article_added)){
    echo "<div class='alert-success text-center';>$article_added </div>";
}
require_once('assets/include/banniere.svg'); 
?>
<!-- Fin du Header -->



<section class="jumbotron  ">
    <div class="container">
        <h1 class="jumbotron-heading DecouvrezNosProduits text-center" >Demarche Zero-Déchets </h1></br>
        <div class="row text-center">
            <div class="col-5-5 col-sm-5 card item-card">
                </br>

                <h5>Qui sommes nous ?</h5>
                </br></br>
                <p>Eco-service est la société qui vous propose la vente de produits zero-dechet et la réservation de services de recyclege en entreprise depuis 20 ans</p>
            </div>
            <div class="col-lg-1">
            </div>

            <div class="col-5-5 col-sm-4 card item-card2">
                </br>
                <h5>Comment ça marche ?</h5>
                </br></br>
                <p>Une multitude de produits zero-déchet sont disponible à la vente pour tout nos visiteurs.
Prenez rendez-vous dès maintenant pour bénéfier de notre sercive de recyclage en entreprise </p>

            </div>    
        </div>
    </div>
</section>


<div class="container mt-3">
<h1 class="jumbotron-heading DecouvrezNosProduits text-center" >Decouvrez nos produits ! </h1></br>

    <div class="row">
    
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-color2 text-white text-uppercase">
                    <i class="fa fa-star"></i> Nos derniers produits 
                </div>
                <div class="card-body">
                    <div class="row">
                    <?php

                    $sql = "SELECT * FROM article  ORDER BY date_ajout DESC";
                    $bdd = $bdd->prepare($sql);
                  
                    $bdd->execute();
              
                    $results = $bdd->fetchAll();
                    
                    foreach($results as $result): ?>
                        <div class="col-sm-4">
                            <div class="card2">
                                <img class="card-img-top" src ="assets/images/articleImg/<?php echo $result['img'] ?>" class="img-fluid rounded " alt="Card image cap">
                                <div class="card-body">
                                    <?php 
                                        if (isset($_SESSION['statut']) AND $_SESSION['statut'] == "2"){ //On affiche sa uniquement si le pseudo = a la session donc juste SES commentaires
                                    ?> 

                                        <!--Supprimer le commentaire-->
                                        <form action="suppproduct_post.php" method="post" class="del2">
                                            <button class="btn btn-sm float-right btndelete" type="submit">
                                            <img src="assets\images\icones\trash-svg.svg" width="20" height="20" class="float-right" title="Supprimer l'article"></button>
                                            <input type="hidden" name="id" value="<?php echo $result['id'] ?>"/>  
                                        </form> 
                                    
                                    <?php 
                                        } 
                                    ?>
                                    <h4 class="card-title"><a style="color: black"href="product.html" title="View Product"><?php echo $result['titre_article'] ; ?></a></h4>
                                    <p class="card-text"><?php echo $result['description'] ; ?></p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="btn btn-danger btn-block"><?php echo $result['prix'] ; ?> €</p>
                                        </div>
                                        <div class="col">
                                        <form class="text-center" method="post" action="addPanier.php?link=accueil">
                                            <input hidden name="id_article" value="<?php echo $result['id'] ?>">
                                            <input class="btn btn-success" type="submit" value="Ajouter au panier"> 
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php endforeach;?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="jumbotron  ">
    <div class="container">
        <h1 class="jumbotron-heading DecouvrezNosProduits text-center" >Decouvrez nos services</h1></br>
        <div class="row ">
            <div class="col-5">
            <img src ="assets/images/imgservices.jpg" class=" img-fluid float-left" width='100%'height="100%">

            </div>
            <div class="col-7">
             <p>Besoin de recyclage au sein de votre entreprise ? Laissez nous faire!
Eco-service débarquera sur place pour effectuer le tri et évaluer la valeur de vos produits zero déchet.
Prenez rendez-vous sans plus attendre!</p>
            <button class="btn btn-success" onclick="window.location.href='services.php'">Voir nos services</button>
            </div>
            
        </div>
    </div>
</section>





<!-- Footer -->
<?php require_once('assets/include/footer.php');?>
</body>
</html>
