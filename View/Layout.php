<?php 

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- meta -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jean Descorps<?= ' - ' . $this->title; ?></title>
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS File -->
  <link href="Content/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="Content/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="Content/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="Content/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="Content/lib/hover/hover.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="Content/css/style.css" rel="stylesheet">
  
  <!-- Blog Stylesheet File -->
  <link href="Content/css/blog.css" rel="stylesheet">

  <!-- Responsive css -->
  <link href="Content/css/responsive.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="Content/images/logo-fav.png">

</head>

<body>

  <!-- start section navbar -->
  <?php if ($this->title != 'Accueil') : ?>
  <nav id="main-nav-subpage" class="subpage-nav">
  <?php else : ?>
  <nav id="main-nav">
  <?php endif ?>
    <div class="row">
      <div class="container">

        <div class="logo">
          <a href="index.php"><img src="Content/images/logo.jpg" alt="logo"></a>
        </div>

        <div class="responsive"><i data-icon="m" class="ion-navicon-round"></i></div>

        <ul class="nav-menu list-unstyled">
          <li><a href="index.php#header" class="smoothScroll">Home</a></li>
          <li><a href="index.php#about" class="smoothScroll">About</a></li>
          <li><a href="index.php#contact" class="smoothScroll">Contact</a></li>
          <li><a href="index.php?action=posts">Blog</a></li>
          <?php if(isset($_SESSION['auth'])) : ?>          
          <li><a href="index.php?action=logout">Déconnexion</a></li>
          <?php else : ?>
          <li><a href="index.php?action=loginView">Inscription/Connexion</a></li>
          <?php endif; ?>
          <?php if (isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 'admin') : ?>
          <li><a href="index.php?action=admin">Administration</a></li>
          <?php elseif (isset($_SESSION['auth']) && $_SESSION['auth']['role'] == 'user') : ?>
          <li><a href="index.php?action=profile">Profil</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End section navbar -->
  
	<?= $content ?>
	
  <!-- start section footer -->
  <div id="footer" class="text-center">
    <div class="container">
      <div class="socials-media text-center">

        <ul class="list-unstyled">
          <li><a href="https://twitter.com/Jean_Descorps"><i class="ion-social-twitter"></i></a></li>
          <li><a href="https://linkedin.com/in/jeandescorps/"><i class="ion-social-linkedin"></i></a></li>
          <li><a href="https://github.com/JeanD34"><i class="ion-social-github"></i></a></li>
        </ul>

      </div>

      <p>&copy; Copyright Jean Descorps</p>

      </div>

    </div>
  </div>
  <!-- End section footer -->

  <!-- JavaScript Libraries -->
  <script src="Content/lib/jquery/jquery.js"></script>
  <script src="Content/lib/jquery/jquery-migrate.min.js"></script>
  <script src="Content/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Content/lib/typed/typed.js"></script>
  <script src="Content/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="Content/js/main.js"></script>

</body>

</html>
