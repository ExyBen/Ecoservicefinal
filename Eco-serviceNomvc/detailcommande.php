
<?php 
    if (!isset($_SESSION))
    {
        session_start();
    }
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 

?>
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
                        <?php  $req = $bdd->prepare('SELECT * FROM detailcommande WHERE idCommande = ?');
                            $req->execute(array($_GET['idCommande']));
                            $donnees = $req->fetch();
                            while ($donnees = $req->fetch()){
                                    $req2 = $bdd->prepare('SELECT * FROM article WHERE id = ?');
                                    $req2->execute(array($donnees['idArticle']));
                                    $donnees2 = $req2->fetch();
                                    echo $donnees2['titre_article'];
                                    echo $donnees['exemplaire'];
                                    $total =   $donnees['exemplaire'] * $donnees2['prix'] ;
                        ?>

                        <div class="cart-item">
                            <div class="row d-flex align-items-center text-center">
                            <div class="col-5">
                                <div class="d-flex align-items-center"><img  width="200px" src="assets/images/articleImg/<?php echo $donnees2['img']?>">
                                <div class="cart-title text-left"><strong><?php echo $donnees2['titre_article'] ?></strong><br>
                                </div>
                                </div>
                            </div>
                            <div class="col-2"><?php echo $donnees2['prix'] ."€" ?></div>
                            <div class="col-2">
                                <div class="d-flex align-items-center">
                                    <div class="col-2"><?php echo "x". $donnees['exemplaire'] ?></div>
                                </div>
                            </div>
                            <div class="col-2 text-center"><?php echo $donnees['exemplaire'] * $donnees2['prix'] . "€"; ?></div>
                            </div>
                        </div>
                        <?php }?>

                        </div>
                        <h4 style="font-family:none;">Prix total de la commande : <b><?php echo $total  ?>€</b></h4>
                        
                    </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
 











