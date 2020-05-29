<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="public/styles/bootstrap.min.css" rel="stylesheet">
  <link href='public/styles/style.css' rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
<title> <?= $title ?></title>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-blue static-top mb-5 shadow">
    <div class="container">
      <a class="navbar-brand" href="<?= "index.php?route=home" ?>">JEAN FORTEROCHE </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= "index.php?route=home" ?>"> <i class="fas fa-home"></i>Accueil
              <span class="sr-only">(current)</span>
            
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?route=bio">Biographie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?route=episodes">Episodes</a>
          </li>
          <li class="nav-item">
            <a href="<?= "index.php?route=login" ?>" class="btn btn-admin btn-primary">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?= $h1 ?>
  <!-- Page Content -->

  <?= $content ?>

  <!-- Footer -->
  <footer class="page-footer font-small blue pt-4">
    <div class="container-fluid text-center ">
      <div class="row">
        <div class=" col-md-6 col-sm-8">
          <h5 class="text-uppercase title-color">PLAN DU SITE</h5>
          <ul class="list-unstyled">
            <li>
              <a class="text-color-a" href="index.php?route=home">Accueil</a>
            </li>
            <li>
              <a class="text-color-a" href="index.php?route=bio">Biographie</a>
            </li>
            <li>
              <a class="text-color-a" href="index.php?route=episodes">Episodes</a>
            </li>
          </ul>
        </div>

        <div class="col-md-4 col-sm-8">
          <h5 class="text-uppercase title-color">MES RESEAUX SOCIAUX</h5>
          <ul class="list-unstyled">
            <li>
              <a class="text-color-a" href="#!">Facebook</a>
            </li>
            <li>
              <a class="text-color-a" href="#!">Instagram</a>
            </li>
            <li>
              <a class="text-color-a" href="#!">Twitter</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>