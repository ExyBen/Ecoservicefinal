<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Eco-Service</title>
    <!-- CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="http://localhost/Eco-service/vue/css/style.css" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
</head>


<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.html" ><img src="http://localhost/Eco-service/vue/img/Logo.png" width="100" ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-navicon" style="color:#668B22; font-size:28px;"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                
                
                <li class="nav-item col-4">
                    <a class="nav-link" href="./index.php/?controle=Page&action=allProducts">Produits</a>
                </li>
                <li class="nav-item col-4">
                    <a class="nav-link" href="./index.php/?controle=Page&action=services">Services</a>
                </li>
                <li class="nav-item col-4">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                

            </ul>

            <div class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <a href="#" class ="iconnav" ><img title="search" alt="search" src="http://localhost/Eco-service/vue/img/icones/search.png" width="30px"></a> 
                    <a href="#" class ="iconnav"><img title="panier" alt="panier" src="http://localhost/Eco-service/vue/img/icones/panier.png" width="30px"></a> 
                    <a href="./index.php/?controle=Page&action=connexion" class ="iconnav"><img title="profil" alt="profil" src="http://localhost/Eco-service/vue/img/icones/profil.png" width="30px"></a> 


                </div>
                
            </div>
        </div>
    </div>
</nav>
<!-- Fin du Header -->
<section class="jumbotron  ">
    <div class="container">
        <h1 class="jumbotron-heading DecouvrezNosProduits text-center" >Decouvrez nos services </h1></br>
        <div >
        </div>
    </div>
</section>

<div class="container w-100">
    <div class="row container-services">
        <div class='col-7'>
            </br>
            <h3 style="color:white;">Service Zero Déchets</h3>
            </br>
            <p style="color:white;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus animi non facere necessitatibus tempora quos, accusantium nisi numquam officiis doloremque est incidunt voluptate error molestias nihil quasi natus reprehenderit fuga.</p>
            <button class="buttonDevis  center-block">Demande de devis</button>
        </div>

        <div class='col-5 no-padding ' >
            <img src ="http://localhost/Eco-service/vue/img/imgservices.jpg" class=" img-fluid float-right" width='100%'height="100%">
        </div>
    </div>
</div>

</div>




<footer class="text-light">
    <div class="container">
        
        <div class="row">
        <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-envelope mr-2"></i> eco-service@gmail.com</li>
                    <li><i class="fa fa-phone mr-2"></i> 01 84 16 20 10</li>
                    <li><i class="fa fa-home mr-2"></i> 30 Rue Turbigo 75003 Paris</li>

                </ul>
            </div>
            

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Nous suivre</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Twitter</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>Description</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Eco-Service est une plateforme de mise en vente de produit Eco-Responsables, nous recyclons aussi les produits des professionnels !
                </p>
            </div>

            
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
                <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href="https://t-php.fr/43-theme-ecommerce-bootstrap-4.html"><i>t-php</i></a> | <span>v. 1.0</span></p>
            </div>
        </div>
    </div>
    
</footer>
</body>
</html>
