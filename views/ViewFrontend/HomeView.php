<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<header id="biographie-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">site officiel de Jean Forteroche</h1>
                <h2 class="text-center text-white"></h2>
                <h4 class="text-center text-white"> Bienvenue ! Je suis Jean Forteroche, retrouvez chaque jour une publication d'un episode de mon dernier roman 'Billet Simple pour l'Alaska'</h4>
            </div>
        </div>
    </div>
</header>

<?php $h1= ob_get_clean(); ?>
<?php ob_start(); ?>


<button type="button" class="btn btn-outline-primary waves-effect">Lire le dernier article</button>

<?php $content = ob_get_clean(); ?>
<?php require('FrontTemplate.php'); ?>