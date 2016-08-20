<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  ?>
  <meta name="description" content="Gestion d'un annuaire - Gladys">
  <meta name="author" content="Philippe Conseil">

  <link rel="apple-touch-icon" sizes="57x57" href="ressources/images/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="ressources/images/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="ressources/images/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="ressources/images/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="ressources/images/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="ressources/images/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="ressources/images/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="ressources/images/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="ressources/images/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="ressources/images/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="ressources/images/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="ressources/images/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="ressources/images/icons/favicon-16x16.png">
  <link rel="manifest" href="ressources/images/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="ressources/images/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <title>Annuaire Gladys</title>

  <!-- Bootstrap core CSS -->
  <link href="ressources/css/bootstrap.min.css" rel="stylesheet">
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link rel="stylesheet" href="ressources/css/ie10-viewport-bug-workaround.css">
  <link rel="stylesheet" href="ressources/css/jquery-ui.min.css" type="text/css" />
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="ressources/css/gladys.css">
  <link rel="stylesheet" href="ressources/css/fonts.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
  <body>

    <?php require_once('ressources/functions.inc.php'); ?>

    <header>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">Annuaire Gladys</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="./">Liste des catégories</a></li>
              <li> - </li>
              <li><a href="?controller=categorys&action=create">Nouvelle catégorie</a></li>
              <li><a href="?controller=sheets&action=create">Nouvelle fiche</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">
          <?php require_once('routes.php'); ?>
        </div>
      </div>
    </div>

    <footer>
      <span class="text-footer">Copyright Gladys Annuaire</span>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="ressources/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="ressources/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="ressources/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="ressources/js/gladys.js"></script>
  </body>
</html>