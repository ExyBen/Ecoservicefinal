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

    <!-- cree l'interface de modification de mot de passe et ou l'on peu voir nos commentaires-->
    <div class="jumbotron top-space text-center">
		<div class="container">
			<div id="creeCV">
                <?php if(isset($messageSuccesMdpChange)){?>
                    <h4 class="successMessage"><?php echo $messageSuccesMdpChange; ?></h4>
                <?php } ?>
			<h2 class="thin text-center">Mon profil</h2> </br>
			</div>
            <div class="modifiercom">
                <p >
                Bonjour <a class="font-weight-bold aaaaa"><?php echo $_SESSION['email'];?> </a> sur cette page tu peux consulter tes informations et modifier ton mot de passe si tu le souhaite ! 
                </p >
                <section class="  container w-100 divBoxLog3 col-lg-4 col-10  ">
                    <div class="row chooseLog">
                        <a class="col-12 text-center justify-content-around itemConnec" id="selectConnexion" >Information </a>
                    </div>
                    <div>
                    
                        <p>Votre mail : <?php echo $_SESSION['email']?> </p>
                        <p>Votre adresse : <?php echo $_SESSION['adresse']?> </p>
                        <?php if(isset($_SESSION['siret'])){ ?>
                            <p>Votre n°SIRET : <?php echo $_SESSION['siret']?> </p>
                        <?php }else{ ?>
                            <p>Vous n'avez pas de SIRET
                        <?php } ?>  
                    </div>  
                </section>
                <div>            
                <a class="col-12 text-center justify-content-around itemConnec" id="selectConnexion" >Modifier ton mot de passe </a>
                <br><br>
                    <form action="profil_post.php" class="text-center" method="post" id="register_form">   
                        <a for="pass">Ancien mot de passe :</a><br > 
                        <input type="password" name="pass"  class="form-controll" value="<?php echo htmlspecialchars($_POST['pass'])?>"/><!-- value on protege contre l'injection de html grace a htmlspecialchars -->
                            <?php if(isset($pass_error)) { ?>     <!-- idem pour le mot de passe-->
                                        <p class="form_error"> <?php echo $pass_error ?> </p> 
                            <?php } ?><br > <br > 
                        <a for="pass">Nouveau mot de passe :</a><br> <input type="password" name="pass2"  class="form-controll" value="<?php echo htmlspecialchars($_POST['pass2'])?>"/><br><br> <!-- value on protege contre l'injection de html grace a htmlspecialchars -->
                        <a for="pass">Retapez le nouveau mot de passe :</a><br><input type="password" name="pass3"  class="form-controll" value="<?php echo htmlspecialchars($_POST['pass3'])?>"/><br><br> <!-- value on protege contre l'injection de html grace a htmlspecialchars -->
                        <?php if(isset($pass_error)) { ?>     <!-- idem pour le mot de passe-->
                            <p class="form_error"> <?php echo $pass_error2 ?> </p>
                        <?php } ?>
                        <button type="submit" class="btn btn-success btnenvoyer text-center">Envoyer</button>
                    </form>
                </div>
			</div>
        </div>
	</div>








<?php require_once('assets/include/footer.php'); ?>


