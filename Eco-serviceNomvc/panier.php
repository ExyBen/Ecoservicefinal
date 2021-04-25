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

<h3 class="text-center">Panier</h3>
<?php if(!empty($msg)) echo "<div class='alert-success text-center'>".$msg."</div><br/>"; ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="col-9" >
            <?php $count = 0; foreach($articles as $article): $total +=   $article['exemplaire'] * $article['prix'] ; $count+= $article['exemplaire']; ?>
                <div class=" mb-5 ">
                    <table  class="border-article">
                        <tr>
                            <td style="padding-left: 20px;" >
                                <?php echo $article['titre_article'] ?>
                            </td>
                            <td style="float:right; padding-right:20px;">
                                <?php echo $article['prix'] ."€" ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px;">
                              <img  width="80px" src="assets/images/articleImg/<?php echo $article['img']?>">
                            </td>
                            <td  style="float:right; padding-right:20px;">
                                <?php echo "x". $article['exemplaire'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px;">
                                <?php echo "total : ". $article['exemplaire'] * $article['prix'] . "€"; ?>
                            </td>
                            <td  style="float:right; padding-right:20px;">
                                <a href="delPanier.php?article=<?php echo $article['id'] ?>&exemplaire=<?php echo $article['exemplaire'] ?>">Supprimer</a>
                            </td>
                        </tr>
                    </table>
                    
                </div>

            <?php endforeach ?>
            </div>
            
        </div>
       <div class="col-3">
            <?php echo $count . " articles" ?>
            <br/>
            <?php echo "Total de la commande : " . $total . ' €' ?>
            
            <br/>
            <a  href="https://paypal.me/nathan93600" > <img style='margin-top:150px; margin-bottom:150px;' src="assets\images\paypal.png" ></a>
            
        </div> 
    </div>

</div>

<!-- Footer -->
<?php require_once('assets/include/footer.php');?>