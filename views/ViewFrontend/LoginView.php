<?php $title = 'Login'; ?>

<?php ob_start(); ?>
<header id="biographie-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">Section administrateur</h1>
        <h4 class="text-center text-white">Veillez saisir votre identifiant et votre mot de passe </4>
      </div>
    </div>
  </div>
</header>
<?php $h1 = ob_get_clean(); ?>


<?php ob_start(); ?>
<div class="container width_container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">


      <form action="index.php?route=login" method="post">

        <div class="form-group row">

          <label for="identifiant" class="col-sm-2 col-form-label">Identifiant</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="identifiant">
          </div>
        </div>

        <div class="form-group row">

          <label for="motdepasse" class="col-sm-2 col-form-label">Mot de passe</label>
          <div class="col-sm-10">
            <input type="password" id="motdepasse" class="form-control" name="motdepasse" placeholder="Mot de passe">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary btn-md login-btn-color" name="connecter">Se connecter</button>
          </div>
        </div>

        <p><?php if (isset($message)) {
              echo $message;
            } ?></p>
        <!-- Grid row -->
      </form>
    </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('FrontTemplate.php'); ?>