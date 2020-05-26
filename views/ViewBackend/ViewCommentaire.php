<?php
$title = 'commentaire signalé';
?>


<?php ob_start(); ?>
<header id="biographie-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">Commentaire Signalé</h1>
      </div>
    </div>
  </div>
</header>
<?php $h1 = ob_get_clean(); ?>


<?php ob_start(); ?>
<?php
foreach ($commentaires as $commentaire) {
?>
  <div class="container width_container">
    <div class="card border-0 shadow my-5">
      <div class="card-body">
        <p class="card-text "> <?php echo $commentaire->getContenu(); ?> </p>
        <a href=<?php echo "index.php?route=supprimerCommentaire-" . $commentaire->getId(); ?> class="suprimer-text black-text d-flex justify-content-end">
          <h5>Supprimer<i class="fas fa-angle-double-right "></i></h5></a>
      </div>
    </div>
  </div>

<?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('BackTemplate.php'); ?>