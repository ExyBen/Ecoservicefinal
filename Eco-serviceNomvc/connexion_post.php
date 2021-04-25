<?php include('assets/include/connexionbdd.php');
; // CETTE PAGE SERT A SE CONNECTER VERIFIER LINFO ENTREE DANS LE FORM ET LES INFO DANS LA BDD


$email = $_POST['email'];
$pass = $_POST['pass'];




$req = $bdd->prepare('SELECT * FROM user WHERE email = ? '); // on selectionne tout les ID,pass de MEMBRES ou pseudo = ? (et pass aussi)
$req->execute(array($email)); // ? est rempli ici avec $email ou $_POST['pseudo']
$insertion = $req->fetch();


// SI $RESTEZ (CHECKBOX PAS VITE && INSERTION DONC CE QUON PREND DE LA BASE DE DONNEE  ET PASS = PASS DE LA BDD DONC  ON DEMARRE LA SESSION ET ON MET UN ID DE SESSION UN PSEUDO ET LES COOKIE SON = A LID ET MDP)
if($insertion && password_verify($pass,$insertion['mdp'])){ //on regarde si ce quon a saisi (insertion && password verify donc le pass saisi et celui de insertion pass)
    echo "OUI";
    session_start(); //si oui on demarre la session
    $_SESSION['id'] = $insertion['id'];
    $_SESSION['testing']   =   time();
    $_SESSION['email'] = $email;
    $_SESSION['statut'] = $insertion['statut'];
    $_SESSION['nom'] = $insertion['nom'];
    $_SESSION['prenom'] = $insertion['prenom'];
    $_SESSION['adresse'] = $insertion['adresse'];
    $_SESSION['zip'] = $insertion['zip'];
    $_SESSION['country'] = $insertion['country'];
    $_SESSION['telnum'] = $insertion['telnum'];

    
    if($insertion['siret'] != null){
        $_SESSION['siret'] = $insertion['siret'];
    }
    

    // on rajoute id groupe pour savoir si l'utilisateur est admin ou non , si oui il auras acces a plus de choses

    
    
    header('location:accueil.php');
 } else{ 
     $error = "Utilisateur inexistant";
    include('log.php');
}


