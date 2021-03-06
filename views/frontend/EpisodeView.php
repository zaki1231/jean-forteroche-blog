<?php $title = 'Episode'; ?>

<?php ob_start(); ?>
<header id="biographie-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
            </div>
        </div>
    </div>
</header>
<?php $h1 = ob_get_clean(); ?>


<?php ob_start(); ?>

<div class="container width_container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h3 class="card-title card-title-color"> <?php echo $episode->getTitre();?></h3>
            <p class="card-text"> <?php echo $episode->getContenu();?></p>
        </div>
    </div>
</div>
 
<form action=<?php echo "index.php?route=ajouterCommentaire-" . $episode->getId(); ?> method="post">
    <div class="container width_container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <h2 class="titleComment">Laisser votre commentaire</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="form-contact-name" class="">Votre pseudo</label>
                            <input type="text" id="form-contact-name" class="form-control" placeholder="Pseudo" name="pseudo">
                        </div>
                    </div>
                </div>
                <div class="row rowComment">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="form-contact-message">Votre commentaire</label>
                            <textarea id="form-contact-message" class="form-control md-textarea" rows="4" placeholder="commentaire" name="comment"></textarea>
                            <button type="submit" class="btn btn-outline-info btn-color waves-effect">Envoyer</button>
                        </div>
                    </div>
                   
                </div>

            </div>
        </div>
    </div>
</form>

<?php
foreach ($commentaires as $commentaire) {
?>
<form action=<?php echo "index.php?route=episode-" .$episode->getId(); ?> method="post">
    <div id="<?php echo 'comment-'.$commentaire->getId(); ?>" class="container width_container">
        <div class="card border-0 shadow my-5">
            <a href='#' class="pseudo"> <?php echo $commentaire->getNomUtilisateur(); ?> </a>
            <div class="card-body">
                <p class="card-text "> <?php echo $commentaire->getContenu(); ?> </p>
                    <p class="message-alerte"><?php if (isset($message) && $commentaire->getSignale()>=1 && $commentaire->getId()== $commentaireIdSignale) {
                                  echo $message;
                                } ?></p>

            </div>
            
            <a href=<?php echo "index.php?route=commentaire-" . $commentaire->getId(); ?> class="btn btn-signaler btn-primary" name="signaler">signaler</a>
        </div>
    </div>

<?php
}
?>
<div id="ancre-commentaire">
    
</div>

<?php $content = ob_get_clean(); ?>
<?php require('FrontTemplateView.php'); ?>