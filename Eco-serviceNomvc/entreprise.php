<?php 
if (!isset($_SESSION))
{
    session_start();
}
require_once('assets/include/header.php'); 


?>
<h3 class="text-center"> Devis pour les entreprises </h3>
<br>
<p class="text-center"> Ici vous pouvez faire réparer vos appareils électroniques </p>
<form action="devis.php" method="post">
    <div class="border-art">
        <img  class="img-devis"  src="assets/images/ordinateur.jfif">
        <p  class="img-devis"> Ordinateur : </p>
        <input  class="img-devis" type="number" min="0" name="ordinateur">
    </div>
    <br/>
    <div class="border-art">
        <img  class="img-devis" src="assets/images/ecran.jfif">
        <p  class="img-devis"> Ecran : </p>
        <input  class="img-devis" type="number" min="0" name="ecran">
    </div>
    <br/>
    <div class="border-art">
        <img  class="img-devis" src="assets/images/imprimante.jfif">
        <p  class="img-devis"> Imprimante : </p>
        <input  class="img-devis" type="number" min="0" name="imprimante">
    </div>
    <br/>
    <div class="border-art">
        <img  class="img-devis" src="assets/images/telephone.jfif">
        <p  class="img-devis"> Téléphone : </p>
        <input  class="img-devis" type="number" min="0" name="telephone">
    </div>
    <br/>
    <div class="border-art">
       <img  class="img-devis" src="assets/images/souris.jfif">
        <p  class="img-devis"> Souris : </p>
        <input  class="img-devis" type="number" min="0" name="souris">
    </div>
    <br/>
    <div class="border-art">
        <img  class="img-devis" src="assets/images/clavier.jfif">
        <p  class="img-devis"> Clavier : </p>
        <input  class="img-devis" type="number" min="0" name="clavier">
    </div>
    <br/>
    <input  class="img-devis" type="submit" value="Faire le devis">
</form>

    
<!-- Footer -->
<?php require_once('assets/include/footer.php');?>