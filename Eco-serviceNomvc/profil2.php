
<?php 
session_start();
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 

?>
<!-- Fin du Header -->
<div class="entete">
    <p> Bonjour <?php echo $_SESSION['email']?> </p> 
    <p>Sur cette page tu peux voir les informations liées à ton compte ainsi que modifier ton mot de passe.</p>
</div>

<section class="jumbotron  ">
    <div class="container">
        <h1 class="jumbotron-heading profil text-center" > Profil </h1></br>
    </div>
</section>

<div class="information">
    <section class="jumbotron  ">
        <div class="container">
            <h1 class="jumbotron-heading profil text-center" > Information </h1></br></br>
            <p> <?php echo $_SESSION['email']?> </p>
            <p> <?php echo $_SESSION['adresse']?> </p>
            <?php if(isset($_SESSION['siret'])){ ?>
                <p> <?php echo $_SESSION['siret']?> </p>
            <?php }else{ ?>
                <p>Vous n'avez pas de SIRET
            <?php } ?>    
        </div>
    </section>
</div>

<br>
<br>
<br>
<br>

<div class=newMotDePasse>
    <p> Ancien mot de passe :</p>
    <input name="oldMDP" type="password" required/>
    <p> Nouveau mot de passe :</p>
    <input name="newMDP" type="password" required/>
    <p> Confirmer nouveau mot de passe:</p>
    <input name="validateNewMDP" type="password" required/>
    <input class="submit" type="submit" value="S'inscrire">
</div>

<div class="vosCommandes">
    <section class="jumbotron  ">
        <div class="container">
            <h1 class="jumbotron-heading profil text-center" > Vos commandes </h1></br></br>
            <table style="width:100%">
                <tr>
                    <th>N° Commande</th>
                    <th>Nb Article</th>
                    <th>Date</th>
                    <th>Total</th>
                </tr>
                <tr class="gris">
                    <td>15456</td>
                    <td>2</td>
                    <td>21/03/2021</td>
                    <td>23 €</td>
                </tr>
                <tr>
                    <td>159749156</td>
                    <td>26</td>
                    <td>17/03/2021</td>
                    <td>196 €</td>
                </tr>
            </table> 
        </div>
    </section>
</div>

<br>
<br>
<br>
<br>



<!-- Footer -->
<?php require_once('assets/include/footer.php');?>
<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

