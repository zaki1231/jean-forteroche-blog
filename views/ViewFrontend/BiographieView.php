<?php
$title = 'ma biographie';
?>


<?php ob_start(); ?>
<header id="biographie-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 main-title text-center text-white d-inline-block position-relative">BIOGRAPHIE</h1>
            
            </div>
        </div>
    </div>
</header>
<?php $h1 = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class="container width_container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">

            <p><?php
                if ($contenuBiographie->getContenu() !== null) {
                    echo $contenuBiographie->getContenu();
                }
                ?></p>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('FrontTemplate.php'); ?>