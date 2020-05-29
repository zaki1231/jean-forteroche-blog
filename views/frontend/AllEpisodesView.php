<?php $title = 'Episodes'; ?>

<?php ob_start(); ?>
<header id="biographie-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">EPISODES</h1>
            </div>
        </div>
</header>

<?php $h1 = ob_get_clean(); ?>


<?php ob_start(); ?>

<div class="col-lg-9 container bloc-card">
        <?php
        foreach ($episodes as $episode) {
        ?>
            <div class="col-lg-5 col-md-5 col-sm-10  card cardHomeAdmin">
                <div class="view overlay">
                    <img class="card-img-top" src="public/images/episode-image.jpg" height="340" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h3 class="card-title card-title-color"> <?php echo $episode->geTtitre(); ?> </h3>
                    <p class="card-text"> <?php echo substr($episode->getContenu(), 0, 320,) ?> [...] </p>

                    <!-- Link -->
                    <a href=<?php echo "index.php?route=episode-" . $episode->getId(); ?> class="black-text text-color d-flex justify-content-end">
                        <h5 class="h5-Modif">Lire la suite...<i class="fas fa-angle-double-right"></i></h5>
                    </a>
                </div>
            </div>

        <?php
        }
        ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('FrontTemplateView.php'); ?>