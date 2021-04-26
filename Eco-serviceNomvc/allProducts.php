

<?php 
if (!isset($_SESSION))
{
    session_start();
}
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 

?>
<!-- Fin du Header -->
<section class="jumbotron  ">
    <div class="container">
        <h1 class="jumbotron-heading DecouvrezNosProduits text-center" >Decouvrez nos produits </h1></br>
        <div >
            <a class="text-left" id="nouveautesProduits" onclick="showNouveautes()">Nouveautés </a>
            <a class="text-left" id="toutProduits" onclick="showAllProduits()">Tous les produits </a>
        </div>
    </div>
</section>
    <?php if(!empty($msg)){
        echo "<div class='alert-success text-center'>$msg </div>";
    }?>
<div class="container w-100 " id="" >
    <div id="allArticles">
        <div class="row"  action="allProducts.php" type="post">

            <?php
            $req = $bdd->query('SELECT * FROM article');
        
            while ($donnees = $req->fetch()) {
            ?>
                <a class="col-sm-4 articleProducts text-center" href ="product.php?article=<?php echo $donnees['id'] ?>">
                <div >
                <?php 
                    if (isset($_SESSION['statut']) AND$_SESSION['statut'] == "2"){ //On affiche sa uniquement si le pseudo = a la session donc juste SES commentaires
                        ?> 

                        <!--Supprimer le commentaire-->
                        <form action="suppproduct_post.php" method="post" class="del2">
                            <button class="btn btn-sm float-right btndelete" type="submit">
                            <img src="assets\images\icones\trash-svg.svg" width="20" height="20" class="float-right" title="Supprimer l'article"></button>
                            <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>  
                        </form> 
                                    
                    <?php 
                    } 
                    ?>
                    <img src ="assets/images/articleImg/<?php echo $donnees['img'] ?>" class="img-fluid rounded " width="90%">
                    <p style="color: black "><?php echo $donnees['titre_article'] ; ?></p>
                    <p style="color: black"> Catégorie :  <?php echo $donnees['categoriearticle'] ; ?></p>
                    <p style="color: black"> Prix :  <?php echo $donnees['prix'] ; ?> €</p>
                    <form class="text-center" method="post" action="addPanier.php?link=allProducts">
                        <input hidden name="id_article" value="<?php echo $donnees['id'] ?>">
                        <input class="btn btn-success" type="submit" value="Ajouter au panier"> 
                    </form>
                </div>
                </A>
            
            <?php
            } // Fin de la boucle des billets
            ?>

        </div>
    </div>
        <div id="newArticles">
        <div class="row "  action="allProducts.php" type="post">

            <?php
            $req = $bdd->query('SELECT * FROM article ORDER BY date_ajout DESC');

            while ($donnees = $req->fetch()) {
            ?>
                <a class="col-sm-4 articleProducts text-center" href ="product.php?article=<?php echo $donnees['id'] ?>">
                <div >
                <?php 
                    if (isset($_SESSION['statut']) AND$_SESSION['statut'] == "2"){ //On affiche sa uniquement si le pseudo = a la session donc juste SES commentaires
                    ?> 

                        <!--Supprimer le commentaire-->
                        <form action="suppproduct_post.php" method="post" class="del2">
                            <button class="btn btn-sm float-right btndelete" type="submit">
                            <img src="assets\images\icones\trash-svg.svg" width="20" height="20" class="float-right" title="Supprimer l'article"></button>
                            <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>  
                        </form> 
                                    
                    <?php 
                    }else{

                    } 
                    ?>
                    <img src ="assets/images/articleImg/<?php echo $donnees['img'] ?>" class="img-fluid rounded " width="90%">
                    <p style="color: black "><?php echo $donnees['titre_article'] ; ?></p>
                    <p style="color: black"> Catégorie :  <?php echo $donnees['categoriearticle'] ; ?></p>
                    <p style="color: black"> Prix :  <?php echo $donnees['prix'] ; ?>€</p>
                    <form class="text-center" method="post" action="addPanier.php?link=allProducts">
                        <input hidden name="id_article" value="<?php echo $donnees['id'] ?>">
                        <input class="btn btn-success" type="submit" value="Ajouter au panier"> 
                    </form>
                </div>
                </A>

            <?php
            } // Fin de la boucle des billets
            ?>

            </div>
        </div>
    </div>

</div>




<!-- Footer -->
<?php require_once('assets/include/footer.php');?>
<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
<script>
    function showNouveautes() {
    var buttonNouveauteProduit = document.getElementById('nouveautesProduits');
    var buttonToutProduits = document.getElementById("toutProduits");
    var allArticles = document.getElementById("allArticles");
    var newArticles = document.getElementById("newArticles");


    allArticles.style.display = "none";
    newArticles.style.display = "block";
    buttonNouveauteProduit.style.fontWeight="bold";
    buttonNouveauteProduit.style.textDecoration="underline";
    buttonNouveauteProduit.style.textDecorationColor="#668B22";
    buttonToutProduits.style.textDecoration="none";

    buttonToutProduits.style.fontWeight="normal";
}
function showAllProduits() {
    var buttonNouveauteProduit = document.getElementById('nouveautesProduits');
    var buttonToutProduits = document.getElementById("toutProduits");
    var allArticles = document.getElementById("allArticles");
    var newArticles = document.getElementById("newArticles");


    allArticles.style.display = "block";
    newArticles.style.display = "none";
    buttonNouveauteProduit.style.fontWeight="normal";
    buttonToutProduits.style.fontWeight="bold";
    buttonToutProduits.style.textDecoration="underline";
    buttonToutProduits.style.textDecorationColor="#668B22";
    buttonNouveauteProduit.style.textDecoration="none";

}

</script>
</body>
</html>
