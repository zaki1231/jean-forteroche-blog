<?php $title = 'Episodes'; ?>

<?php ob_start(); ?>
<header id="biographie-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">site officiel de Jean Forteroche</h1>
                <h2 class="text-center text-white"></h2>
                <h4 class="text-center text-white"> Bienvenue ! Je suis Jean Forteroche, retrouvez tous les 3pisodes</h4>
            </div>
        </div>
</header>

<?php $h1 = ob_get_clean(); ?>


<?php ob_start(); ?>
<div class='bloc-card '>
    <?php
    foreach ($episodes as $episode) {
    ?>

        <!-- Card Light -->
        <div class="col-sm-10 col-md-3 card cardHomeAdmin">

            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="t1.jpg" height="340" alt="Card image cap">

            </div>

            <!-- Card content -->
            <div class="card-body">

                <h3 class="card-title card-title-color"> <?php echo $episode->geTtitre(); ?> </h3>

                <!-- Text -->
                <p class="card-text"> <?php echo substr($episode->getContenu(), 0, 300) ?>... </p>

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
<?php require('FrontTemplate.php'); ?>