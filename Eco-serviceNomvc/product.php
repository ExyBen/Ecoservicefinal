
<?php 
    if (!isset($_SESSION))
    {
        session_start();
    }
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 


$req = $bdd->prepare('SELECT * FROM article WHERE id = ?');
$req->execute(array($_GET['article']));
 $donnees = $req->fetch();
    // si il n'ya pas de donnee on echo pas d'article au sinon on affiche la page JUSQUA
     if(!$donnees){
         echo "Pas d'article";
        
     } else {
        $sql = "SELECT COUNT(Nottation) FROM note  WHERE idArticle = :idArticle";
        $count = $bdd->prepare($sql);
        $count->bindParam(':idArticle',$donnees['id']);
        $count->execute();
        $total = $count->fetch();
      
        $sql = "SELECT AVG(Nottation) FROM note  WHERE idArticle = :idArticle";
        $count = $bdd->prepare($sql);
        $count->bindParam(':idArticle',$donnees['id']);
        $count->execute();
        $moyenne = $count->fetch();
        $moyenne = round($moyenne[0]);
?>
<!-- Fin du Header -->
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?php echo $donnees['titre_article']; ?></h1>
        <p class="lead text-muted mb-0"><?php echo $donnees['description']; ?></p>
    </div>
</section>
<?php if(!empty($msg)){
            echo "<div class='alert-success text-center';>$msg </div>";
        }?>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="allProducts.php">Tout les produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $donnees['titre_article']; ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body text-center">
                        <img class="img-fluid" width="250" height="220" src="assets/images/articleImg/<?php echo $donnees['img']; ?>" />
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <p class="price"><?php echo $donnees['prix']; ?> €</p>
                    <form method="post" action="addPanier.php?link=product">
                        <input hidden name="id_article" value="<?php echo $donnees['id']; ?>">
                        <div class="form-group">
                            <label>Quantité :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control"  id="quantity" name="exemplaire" min="1" max="100" value="1">
                                <div class="input-group-append">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input style="margin:auto; display:block;" class="btn btn-action"value="Ajoutez au panier" type="submit">
                    </form>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Livraison rapide</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Paiement sécurisé</li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>01 84 16 20 10</li>
                        </ul>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                        
                        <?php if(empty($total[0])) echo "0"; else echo $total[0]; ?> avis
                        <a href="addAvis.php?rate=1&article=<?php echo $donnees['id']; ?>"> <img src=".\assets\images\starup.png" > </a>
                        <a href="addAvis.php?rate=2&article=<?php echo $donnees['id']; ?>"> <img src=".\assets\images\<?php if($moyenne >= 2 ) echo "starup" ;else echo "stardown"; ?>.png" > </a>
                        <a href="addAvis.php?rate=3&article=<?php echo $donnees['id']; ?>"> <img src=".\assets\images\<?php if($moyenne >= 3 ) echo "starup" ;else echo "stardown"; ?>.png" > </a>
                        <a href="addAvis.php?rate=4&article=<?php echo $donnees['id']; ?>"> <img src=".\assets\images\<?php if($moyenne >= 4 ) echo "starup" ;else echo "stardown"; ?>.png" > </a>
                        <a href="addAvis.php?rate=5&article=<?php echo $donnees['id']; ?>"> <img src=".\assets\images\<?php if($moyenne >= 5 ) echo "starup" ;else echo "stardown"; ?>.png" > </a>

                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-color2 text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                    <p class="card-text">
                    <?php echo $donnees['description']; ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-color2 text-white text-uppercase"><i class="fa fa-comment"></i> Commentaires</div>
                <div class="card-body">
                    <div class="review">
                    <?php 
                    $req = $bdd->prepare('SELECT user.nom, user.email,user.prenom,c.id,c.idUser, c.texte, c.idArticle,DATE_FORMAT(c.date_commentaire, \'%d/%m/%Y à %Hh %imin\') AS date_commentaire_fr  FROM commentaire AS c LEFT JOIN user ON c.idUser = user.id WHERE c.idArticle = ? ORDER BY c.date_commentaire DESC'); 
                    $req->execute(array($_GET['article']));
                    if($req->rowCount() == 0){ // SI ROWCOUNT = 0 DONT IL YA PAS DE COMM ON ECHO XXX SINON ON FAIS LA BOUCLE
                    ?>
                        <div class='text-center'>Pas encore de commentaires , soyez le premier ! </div>
                    <?php
                    }else{

                            while ($donnees = $req->fetch()){
                    ?>  
                        <?php 
                            if ($_SESSION['email'] == $donnees['email']){ //On affiche sa uniquement si le pseudo = a la session donc juste SES commentaires
                        ?> 

                        <!--Supprimer le commentaire-->
                        <form action="suppcom.php" method="post" class="del2">
                            <button class="btn btn-sm float-right" type="submit">
                            <img src="assets\images\icones\trash-svg.svg" width="16" height="16" class="float-right" title="Supprimer le commentaire"></button>
                            <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>"/>  
                            <input type="hidden" name="idArticle" value="<?php echo $_GET['article'] ?>"/>  

                        </form> 
                        
                        <?php 
                            } 
                        ?>
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016"><?php echo $donnees['date_commentaire_fr']; ?>

                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        par <?php echo htmlspecialchars($donnees['prenom']); ?> <?php echo htmlspecialchars($donnees['nom']); ?>
                        <p class="blockquote">
                            <p class="mb-0"><?php echo nl2br(htmlspecialchars($donnees['texte'])); ?></p>
                        </p>
                        <hr>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-100"></div>
<?php if(isset($_SESSION['id']) AND isset($_SESSION['email'])){  ?>
			<!-- Article main content -->
			<article class="text-center">
				<header class="page-header">
					<h4 class="page-title">Ajoute ton commentaire !</h4>
                </header>
                <form action="articlecomm_post.php" method="post">
                    <br>
                    <p class=""></p> 
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>"/>  
                    <input type="hidden" name="id_article" value="<?php echo $_GET['article'] ?>"/>  
                    <div class="col-sm-12">
						<div class="col-sm-4 offset-sm-4 ">
							<textarea placeholder="Ecrivez votre message ici..." class="form-control" name ="texte"rows="9"></textarea>
						</div>
					</div>
					<br>
					<div class="row">	
						<div class="col-sm-12 ">
								<input class="btn btn-action" type="submit" value="Envoyer le message">
							</div>
						</div>
				</form>
			</article>
        </div>
<?php }else{ ?>
            <article class="text-center">
				<header class="page-header">
					<h4 class="page-title">Inscris toi ou connecte toi pour poster un commentaire !</h4>
                </header>
			</article>
<?php } ?>
</div>
<!-- Footer -->
<?php require_once('assets/include/footer.php');?>

<!-- Modal image -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="https://dummyimage.com/1200x1200/55595c/fff" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    //Plus & Moins pour la quantité
    $(document).ready(function(){
        var quantity = 1;

        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if(quantity > 1){
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
</body>
</html>
<?php } ?> <!-- JUSQUA ICI ON FERME LACCOLADE ENTRE LA BALISE PHP -->