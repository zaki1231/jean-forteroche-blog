<?php $title = 'Contact'; ?>

<?php ob_start(); ?>
<header id="biographie-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">Formulaire de contact</h1>
      </div>
    </div>
  </div>
</header>
<?php $h1 = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="container width_container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">


      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-lg-12">

          <div class="card-body form">

            <div class="row">

              <!-- Grid column -->
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <label for="form-contact-name" class="">Votre Nom</label>
                  <input type="text" id="form-contact-name" class="form-control">
                </div>
              </div>
              <!-- Grid column -->
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <label for="form-contact-name" class="">Votre Prénom</label>
                  <input type="text" id="form-contact-name" class="form-control">
                </div>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <label for="form-contact-email" class="">Votre adresse e-mail</label>
                  <input type="text" id="form-contact-email" class="form-control">
                </div>
              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <label for="form-contact-object" class="">Objet de votre message</label>
                  <input type="text" id="form-contact-object" class="form-control">
                </div>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <label for="form-contact-message">Votre message</label>
                  <textarea id="form-contact-message" class="form-control md-textarea" rows="4"></textarea>
                </div>
              </div>
              <!-- Grid column -->

            </div>
            <button type="button" class="btn btn-outline-info btn-color waves-effect">Envoyer</button>
          </div>

        </div>
      </div>
    </div>
    <!-- Grid column -->


    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Form with header -->

</section>
<!-- Section: Contact v.3 -->
<?php $content = ob_get_clean(); ?>
<?php require('FrontTemplate.php'); ?>