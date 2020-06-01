<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
<header id="biographie-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 main-title text-center text-white d-inline-block position-relative title-accueil">Billet simple pour l'Alaska</h1>
            </div>
        </div>
    </div>
</header>

<?php $h1 = ob_get_clean(); ?>

<?php ob_start(); ?>
<!-- Card -->
<div class=" container col-lg-6 col-md-6 col-sm-10">

    <div class="card promoting-card card-accueil">
        <div class="card-body d-flex flex-row">
            <div>
                <h4 class="card-title title episode-accueil font-weight-bold mb-2"><?php echo  $episodeRecent->getTitre(); ?></h4>
                <p class="card-text"></i>Publié le : <?php echo  $episodeRecent->getDatePublication(); ?></p>
            </div>
        </div>
        <div class="view overlay">
            <img class="card-img-top rounded-0" src="public/images/accueil-image.jpg" alt="Card image cap">
            <a href="#!">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>
        <div class="card-body">
            <div class="collapse-content">
                <p class="card-text collapse" id="collapseContent"><?php echo substr($episodeRecent->getContenu(), 0, 400) ?>...</p>
                <a href=<?php echo "index.php?route=episode-" . $episodeRecent->getId(); ?> class="black-text text-color d-flex justify-content-end">
                    <h5 class="h5-Modif">Lire la suite...<i class="fas fa-angle-double-right"></i></h5>
                </a>
            </div>
        </div>
    </div>


</div>

<?php $content = ob_get_clean(); ?>
<?php require('FrontTemplateView.php'); ?>