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
        <h1 class="jumbotron-heading DecouvrezNosProduits text-center" >Panier </h1></br>    
    </div>
</section>
<?php if(!empty($msg)) echo "<div class='alert-success text-center'>".$msg."</div><br/>"; ?>

<section>
      <div class="container">
        <div class="row mb-5"> 
          <div class="col-lg-8">
            <div class="cart" >
              <div class="cart-wrapper" >
                <div class="cart-header text-center" style="border: 2px solid #668B22; border-radiux:10px;">
                  <div class="row ligne1" style="margin-bottom:10px;">
                    <div class="col-5">Produit</div>
                    <div class="col-2">Prix</div>
                    <div class="col-2">Quantitée</div>
                    <div class="col-2">Prix total</div>
                    <div class="col-1"></div>
                  </div>
                </div>
                <div class="cart-body" >
                  <!-- Product-->
                  <?php $count = 0; foreach($articles as $article): $total +=   $article['exemplaire'] * $article['prix'] ; $count+= $article['exemplaire']; ?>

                  <div class="cart-item" style="border: 1px solid #668B22; border-radiux:10px;">
                    <div class="row d-flex align-items-center text-center">
                      <div class="col-5">
                        <div class="d-flex align-items-center"><a href="detail.html"><img  width="150px" src="assets/images/articleImg/<?php echo $article['img']?>"></a>
                          <div class="cart-title text-left"><a class="text-uppercase text-dark" href="detail.html"><strong><?php echo $article['titre_article'] ?></strong></a><br>
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
              </div>
            </div>
            <div class="my-5 d-flex justify-content-between flex-column flex-lg-row"><a class="btn btn-link text-muted" href="allProducts.php"><i class="fa fa-chevron-left"></i>Revenir à la boutique</a><a class="btn btn-success" href="finalpay.php">Proceder au paiement <i class="fa fa-chevron-right"></i>                                                     </a></div>
          </div>
          <div class="col-lg-4">
            <div class="block mb-5">
              <div class="block-header">
                <h6 class="text-uppercase mb-0">Recapitulatif de la commande</h6>
              </div>
              <div class="block-body bg-light pt-1">
              <a>Vous Avez <?php echo $count  ?> articles dans votre panier ! </a>
            <br/>
            <?php echo "Prix total de la commande : " . $total . ' €' ?>
            
            <br/>
            <!-- <a  href="finalpay.php" > <img style='margin-top:150px; margin-bottom:150px;' src="assets\images\paypal.png" ></a> -->
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<!-- Footer -->
<?php require_once('assets/include/footer.php');?>