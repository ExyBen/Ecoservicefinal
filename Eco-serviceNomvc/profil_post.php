<?php 

    
    session_start();

include('assets/include/connexionbdd.php');
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$pass3 = $_POST['pass3'];

$pass_hache = password_hash($pass, PASSWORD_DEFAULT);
$pass_hache2 = password_hash($pass2, PASSWORD_DEFAULT);
$pass_hache3 = password_hash($pass3, PASSWORD_DEFAULT);


if(!isset($pass_error)){
    $pass_error = '';
}
if(!isset($pass_error2)){
    $pass_error2 = '';
}

// DABORD ON VERIFIE SI LE PASS EST CORRECT  PAR RAPPORT AU PASS DE LA BDD
$req = $bdd->prepare('SELECT email, mdp FROM user WHERE email = ? '); // on selectionne tout les ID,pass de MEMBRES ou pseudo = ? (et pass aussi)
$req->execute(array($_SESSION['email'])); // ? est rempli ici avec $pseudo ou $_POST['pass']
$insertion = $req->fetch();

if(password_verify($pass, $insertion['mdp'])==false){    
    $pass_error = "Mot de passe incorrect ";
}
if($pass2 !== $pass3){
    $pass_error2 = "Mot de passe différents !";
}

if(empty($pass_error) & empty($pass_error2)){ //on regarde si ce quon a saisi (insertion && password verify donc le pass saisi et celui de insertion pass) SI INSERTION 
// SI LE PASS EST BON  ON FAIS LA SUITE

    // SI LES 2 CHAMPS SONT IDEM ON UPDATE PASS
    

    $req = $bdd->prepare('UPDATE user SET mdp=? WHERE email = ?');
    $req->execute(array($pass_hache2,$_SESSION['email']));
    $messageSuccesMdpChange = "Votre mot de passe a bien été changé ! ";
    include("profil.php"); 

    include('assets/include/connexionbdd.php');

    }else{ 

    include("profil.php"); 
        }

?>