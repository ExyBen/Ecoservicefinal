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
        <img src="assets/images/ordinateur.jfif">
        <p> Ordinateur : </p>
        <input type="number" min="0" name="ordinateur">
    </div>
    <br/>
    <div class="border-art">
        <img src="assets/images/ecran.jfif">
        <p> Ecran : </p>
        <input type="number" min="0" name="ecran">
    </div>
    <br/>
    <div class="border-art">
        <img src="assets/images/imprimante.jfif">
        <p> Imprimante : </p>
        <input type="number" min="0" name="imprimante">
    </div>
    <br/>
    <div class="border-art">
        <img src="assets/images/telephone.jfif">
        <p> Téléphone : </p>
        <input type="number" min="0" name="telephone">
    </div>
    <br/>
    <div class="border-art">
       <img src="assets/images/souris.jfif">
        <p> Souris : </p>
        <input type="number" min="0" name="souris">
    </div>
    <br/>
    <div class="border-art">
        <img src="assets/images/clavier.jfif">
        <p> Clavier : </p>
        <input type="number" min="0" name="clavier">
    </div>
    <br/>
    <input type="submit" value="Faire le devis">
</form>

    
