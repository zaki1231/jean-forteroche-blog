<?php
$title = 'tableau de bord';
?>


<?php ob_start(); ?>
<header id="biographie-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">TABLEAU DE BORD</h1>
      </div>
    </div>
  </div>
</header>
<a href="<?= "index.php?route=newEpisode" ?>" class="btn btn-article btn-primary">Ajoutez un episode</a>

<?php $h1 = ob_get_clean(); ?>


<?php ob_start(); ?>

<div class="bloc-card">
  <?php
  foreach ($episodes as $episode) {
  ?>

    <!-- Card Light -->


    <div class="col-xs-10 col-sm-10 col-md-3 card cardHomeAdmin">

      <!-- Card image -->
      <div class="view overlay">
        <img class="card-img-top" src="public/images/episode-image.jpg" alt="Card image cap">
      </div>

      <!-- Card content -->
      <div class="card-body">

        <!-- Social shares button -->
        <a class="activator waves-effect waves-light mr-4"><i class="fas fa-share-alt"></i></a>
        <!-- Title -->

        <h4 class="card-title-color "> <?php echo $episode->geTtitre(); ?> </h4>

        <!-- Text -->
        <p class="card-text-color"> <?php echo substr($episode->getContenu(), 0, 300) ?> </p>

        <!-- Link -->
        <a href=<?php echo "index.php?route=AffichageModifierEpisode-" . $episode->getId(); ?> class="black-text d-flex justify-content-end">
          <h5>Modifier<i class="fas fa-angle-double-right"></i></h5>
        </a>
        <a href=<?php echo "index.php?route=supprimerEpisode-" . $episode->getId(); ?> class="suprimer-text black-text d-flex justify-content-end">
          <h5>Supprimer<i class="fas fa-angle-double-right "></i></h5>
        </a>


      </div>

    </div>

  <?php
  }

  ?>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('BackTemplate.php'); ?>