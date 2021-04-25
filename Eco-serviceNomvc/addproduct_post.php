<?php 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ecoservice;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


        $titre_article = $_POST['titre_article'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $categoriearticle = $_POST['categoriearticle'];
        if(!empty($categoriearticle) AND !empty($description) AND !empty($prix) AND !empty($titre_article)){
                $datimer=date ("Y-m-d H:i:s");
                $req = $bdd->prepare('INSERT INTO article (titre_article,prix,description,categoriearticle,date_ajout) VALUES(?,?,?,?,?)'); 
                $req->execute(array($titre_article,$prix,$description,$categoriearticle,$datimer));
                // header("Location: map.php"); // redirection vers map.php
                
        //on recupere l'autoincrement du dernier en date pour l'ajouter a l'image apres
        $lastId = $bdd->lastInsertId();

                        if(isset($_FILES['img']) AND !empty($_FILES['img']['name'])){
                        $tailleMax = 2097152;
                        $extensionsValides = array('jpg','jpeg','png');
                if($_FILES['img']['size'] <= $tailleMax){
                        $extensionUpload = strtolower(substr(strrchr($_FILES['img']['name'], '.'), 1));
                        if(in_array($extensionUpload, $extensionsValides)){
                                $chemin = "assets/images/articleImg/article".$lastId.'.'.$extensionUpload;
                                $resultat = move_uploaded_file($_FILES['img']['tmp_name'],$chemin);
                                if($resultat){
                                        $updateavatar = $bdd ->prepare('UPDATE article SET img = :img WHERE id = :id');
                                        $updateavatar->execute(array(
                                                'img' => "article".$lastId.".".$extensionUpload,
                                                'id' => $lastId
                                        ));
        
                                }else{
                                        $msg= "Erreur durant l'importation de votre photo de profil";
                                }
                        }else{
                                $msg = "Votre photo de profil doit être au format jpg, jpeg ou png";
                        }
                }else{
                        $msg ="Votre photo ne doit pas dépasser 2mo";
                }
        }

        $article_added = 'Votre article a bien été ajouté en base de données !';
        include('accueil.php');
    }else{
        header('addproduct.php');
    }             
                    