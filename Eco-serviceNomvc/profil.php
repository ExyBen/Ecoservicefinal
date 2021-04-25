
<?php 
if (!isset($_SESSION))
{
    session_start();
}
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 

if(!isset($_POST['pass'])){
    $_POST['pass'] = '';
}
if(!isset($_POST['pass2'])){
    $_POST['pass2'] = '';
}
if(!isset($_POST['pass3'])){
    $_POST['pass3'] = '';
}

?>
<!-- Fin du Header -->
<div class="entete">
    <p> Bonjour <?php echo $_SESSION['email']?> </p> 
    <p>Sur cette page tu peux voir les informations liées à ton compte ainsi que modifier ton mot de passe.</p>
</div>

<?php if(isset($messageSuccesMdpChange)){?>
        <h4 class="successMessage"><?php echo $messageSuccesMdpChange; ?></h4>
<?php } ?>

<section class="jumbotron ">
    <div class="container">
        <h1 class="jumbotron-heading profil text-center" >Profil </h1>
    </div>
</section>

<div class="information">
    <section class="jumbotron  ">
        <div class="container">
            <h1 class="jumbotron-heading profil text-center" > Information </h1></br></br>
            <p>Votre Nom : <?php echo $_SESSION['nom']?> </p>
            <p>Votre Prenom : <?php echo $_SESSION['prenom']?> </p>
            <p>Votre numéro de téléphone : <?php echo $_SESSION['telnum']?> </p>
            <p>Votre mail : <?php echo $_SESSION['email']?> </p>
            <p>Votre adresse : <?php echo $_SESSION['adresse']?> </p>
            <p>Votre Code postal : <?php echo $_SESSION['zip']?> </p>
            <p>Votre Pays : <?php echo $_SESSION['country']?> </p>
            <p>Votre SIRET :<?php if(isset($_SESSION['siret'])){ ?>
                <a> <?php echo $_SESSION['siret']?> </a>
            <?php }else{ ?>
                <a>Vous n'avez pas de SIRET</a>
            <?php } ?>    
        </div>
    </section>
</div>

<br>
<br>

<div class=newMotDePasse>
    <form action="profil_post.php" method="post" id="register_form">
        <p> Ancien mot de passe :</p>
        <input name="pass" type="password" required value="<?php echo htmlspecialchars($_POST['pass'])?>"/>
        <?php if(isset($pass_error)) { ?>     <!-- idem pour le mot de passe-->
            <p class="form_error"> <?php echo $pass_error ?> </p> 
        <?php } ?> 
        <p> Nouveau mot de passe :</p>
        <input name="pass2" type="password" required value="<?php echo htmlspecialchars($_POST['pass2'])?>"/>
        <p> Confirmer nouveau mot de passe:</p>
        <input name="pass3" type="password" required value="<?php echo htmlspecialchars($_POST['pass3'])?>"/>
        <?php if(isset($pass_error)) { ?>     <!-- idem pour le mot de passe-->
            <p class="form_error"> <?php echo $pass_error2 ?> </p>
        <?php } ?>
        <input class="submit" type="submit" value="S'inscrire">
    </form>
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
                    <th>Statut</th>
                    <th>Total</th>
                </tr>
                <?php $req = $bdd->prepare('SELECT * FROM commande WHERE idUser = ?');
                        $req->execute(array($_SESSION['id']));
                        $donnees = $req->fetch();
                            // si il n'ya pas de donnee on echo pas d'article au sinon on affiche la page JUSQUA
                            if(!$donnees){
                                echo "Vous n'avez pas encore fait de commandes !";
        
                        } else {
                            while ($donnees = $req->fetch()){
                        ?>
                <tr>
                    <td><?php echo $donnees['id'] ?></td>
                    <td><?php echo $donnees['nb_articles'] ?></td>
                    <td><?php echo $donnees['date_commande'] ?></td>
                    <td><?php  if($donnees['statut']== '1'){
                        echo "En cours"; 
                    }else{
                        echo "Livré";
                    } ?></td>
                    <td><?php echo $donnees['prix'] ?></td>
                </tr>
                <?php } } ?>
            </table> 
        </div>
    </section>
</div>

<br>
<br>



<!-- Footer -->
<?php require_once('assets/include/footer.php');?>
<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

