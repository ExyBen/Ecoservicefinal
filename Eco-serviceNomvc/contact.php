<!DOCTYPE html>
<?php 
session_start();
include('assets/include/connexionbdd.php');
require_once('assets/include/header.php'); 

?>
<!-- Fin du Header -->
<section class="jumbotron  ">
    <div class="container">
        <h1 class="jumbotron-heading profil text-center" > Contact </h1></br>
    </div>
</section>

<section class=" testici  container w-100 divBoxLog2 col-lg-4 col-10  ">
    
    <div class="rectangle">
        <div class="row text-center logSignForm">
            <div id="inscriptionForm" style = "display:black;" class="container w-100 col-12">
                <form action="./index.php/?controle=connexion&action=inscription" method="post">
                    <p>Nom  <br><input type="text" name="nom" required/></p>
                    <p>Votre email <br><input type="text" name="email" required/></p>
                    <p>Objet <br><input  type="text" name="Objet" required/></p>
                    <p>Votre Message <br> <input class="msg" type="text" name="message" /></p>
                    <p><input class="submit" type="submit" value="Valider"></p>
                </form>
            </div>              
        </div>
    </div>
</section>

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

