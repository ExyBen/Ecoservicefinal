
<?php 
 if (!isset($_SESSION))
 {
     session_start();
 }
include('assets/include/connexionbdd.php');
include('assets/include/header.php');



if(isset($_SESSION['id']) AND isset($_SESSION['email']) AND $_SESSION['statut']=="2"){  ?>
<section class="jumbotron ">
    <div class="container">
        <h1 class="jumbotron-heading profil text-center" >Gestion des commandes </h1>
        <p class="text-center">Sur cette page, vous pouvez gérez les commandes de tout vos clients , Appuyez sur le N° de commande pour voir tout les détails de celle-ci ou "Valider la commande" lorsque celle-ci est livrée pour passer son statut à "Livrée" </p>

    </div>
</section>
<section>
      <div class="container">
        <div class=" col-12"> 
            <div class="cart" >
              <div class="cart-wrapper" >
                <div class="cart-header text-center" style="border: 2px solid #668B22; border-radiux:10px;">
                  <div class="row ligne1" style="margin-bottom:10px;">
                    <div class="col-2">N° Commande</div>
                    <div class="col-2">Nb Article</div>
                    <div class="col-2">Date</div>
                    <div class="col-2">Statut</div>
                    <div class="col-2">Total</div>
                    <div class="col-2">Valider la commande</div>

                  </div>
                </div>
                <div class="cart-body" >
                  <!-- Product-->
                  <?php $req = $bdd->prepare('SELECT * FROM commande');
                        $req->execute();
                        
                            // si il n'ya pas de donnee on echo pas d'article au sinon on affiche la page JUSQUA
                            
                            while ($donnees = $req->fetch()){
                                if(!$donnees){
                                    echo "Vous n'avez pas encore fait de commandes !";
            
                            } else {
                        ?>

                  <div class="cart-item" style="border: 1px solid #668B22; border-radiux:10px;">
                    <div class="row d-flex align-items-center text-center">
                      <div class="col-2"><?php echo $donnees['id'] ?></div>
                      <div class="col-2"><?php echo $donnees['nb_articles'] ?></div>
                      <div class="col-2"><?php echo $donnees['date_commande'] ?></div>
                      <div class="col-2">
                            <div class="col-2"><?php  if($donnees['statut']== '1'){
                                echo "En cours"; 
                            }else{
                                echo "Livrée";
                            } ?>
                        </div>
                      </div>
                      <div class="col-2 text-center"><?php echo $donnees['prix'] ?> €</div>
                      <div class="col-1 text-center"><?php  if($donnees['statut']== '1'){?><a class="cart-remove" href="updatecommandes_post.php?id=<?php echo $donnees['id']; ?>"> <i class="fas fa-check"></i></a>
                     <?php  }else{

                            } ?>
                    </div>
                    </div>
                  </div>
                  <?php }} ?>

                </div>
              </div>
          </div>
            
            <!-- <a  href="finalpay.php" > <img style='margin-top:150px; margin-bottom:150px;' src="assets\images\paypal.png" ></a> -->
        </div>
      </div>
</section>

<?php } ?>