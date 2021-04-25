<?php 
        include('assets/include/connexionbdd.php');
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $siret = $_POST['siret'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];
        $email = $_POST['email'];
        $telnum = $_POST['telnum'];
        $zip = $_POST['zip'];
        $country = $_POST['country'];
        /*
 * filtre pour valider l'email
 */
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Le format de l'email est invalide";
        }

        $verifzip = "/[0-9]{5}/";
        if(!preg_match($verifzip, $_POST['zip']))
        {
           $zip_error = 'Mauvais Code postal !';     
        
        }
        $veriftel = "/[0-9]{10}/";
        if(!preg_match($veriftel, $_POST['telnum']))
        {
           $tel_error = 'Mauvais numéro de téléphone !';     
        
        }
        // IL YA DEJA QQUN QUI UTILISE CE PSEUDO 
        $req = $bdd->prepare('SELECT email FROM user WHERE email=?'); // on selectionne tout les pseudo ou pseudo = ?
        $req->execute(array($email)); // ? est rempli ici avec $pseudo ou $_POST'pseudo']
        if ($donnees = $req ->fetch())
        {
          $email_error = 'Il y a déjà une personne qui utilise ce pseudo !';

        }
        
        if($pass !== $pass2){
                $password_error = "Mot de passe différents !";
        }
        if(empty($pass)) {
                $password_error = 'Rentrez un mot de passe !!';
        }elseif(strlen($pass) < 3){
                $password_error = 'Mot de passe trop court !!';

        }

        if(empty($email_error) && empty($password_error) && empty($zip_error)&& empty($tel_error)){
                $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
                $req = $bdd->prepare('INSERT INTO user (prenom,nom,zip,country,telnum,email,mdp,adresse,statut,siret) VALUES(?,?,?,?,?,?,?,?,"1",?)'); 
                $req->execute(array($prenom,$nom,$zip,$country,$telnum,$email,$pass_hache, $adresse,$siret));
                header("Location: accueil.php"); // redirection vers login.php
                exit();
                        } else {
                include('log.php');
        }