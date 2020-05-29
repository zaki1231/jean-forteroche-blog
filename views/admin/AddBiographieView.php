<?php $title = 'Modifiez ma biographie'; ?>

<?php ob_start(); ?>
<header id="biographie-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="text-center text-white">Vous pouvez modifiez votre Biographie</h2>
      </div>
    </div>
  </div>
</header>
<?php $h1 = ob_get_clean(); ?>

<?php ob_start(); ?>
<div class='container'>
  <div class="tinymce-width">
    <script src="https://cdn.tiny.cloud/1/7s1qz31y5wi146yyq2qajgvwaz99940hjvn686n6nvo79rlg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <form action="index.php?route=addBiographie" method="post">
      <textarea name="modifierTextEpisode" value="<?php echo $biographie->getContenu(); ?>"> </textarea>
      <input class="btn btn-article btn-primary" type="submit" value="Publier" />
    </form>

    <script>
      tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
      });
    </script>
  </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('adminTemplateView.php'); ?>