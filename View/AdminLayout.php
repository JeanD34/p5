<?php 
setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
$page = $_SERVER['REQUEST_URI'];
$activePage = str_replace('/blog/index.php?action=', '', $page);

?>
<!doctype html>
<html class="no-js h-100" lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Administration</title>
    <meta name="description" content="Partie administration du blog">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="Content/backend/styles/shards-dashboards.1.1.0.css">
    <link rel="stylesheet" href="Content/backend/styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  	<link rel="shortcut icon" href="Content/images/logo-fav.png">
  </head>
  
  <body class="h-100">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="index.php" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="Content/images/logo-fav.png" alt="Jean Descorps">
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
            <?php if($_SESSION['auth']['role'] === 'admin') : ?>
              <li class="nav-item">
                <a class="nav-link <?php if ($activePage === 'admin') { echo 'active'; } ?>" href="index.php?action=admin">
                  <i class="material-icons">pan_tool</i>
                  <span>Panneau d'administration</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($activePage === 'adminPosts') { echo 'active'; } ?>" href="?action=adminPosts">
                  <i class="material-icons">vertical_split</i>
                  <span>Tous les articles</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($activePage === 'addPostView') { echo 'active'; } ?>" href="?action=addPostView">
                  <i class="material-icons">note_add</i>
                  <span>Ajouter un article</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if ($activePage === 'users') { echo 'active'; } ?>" href="tables.html">
                  <i class="material-icons">table_chart</i>
                  <span>Utilisateurs</span>
                </a>
              </li>
        		<?php if (stristr($activePage, 'updateView')) : ?>
               <li class="nav-item">
                <a class="nav-link active" href="">
                  <i class="material-icons">note</i>
                  <span>Modifier article</span>
                </a>
              </li>
              <?php endif; ?> 
              <li class="nav-item">
                <a class="nav-link <?php if ($activePage === 'adminComments') { echo 'active'; } ?>" href="?action=adminComments">
                  <i class="material-icons">insert_comment</i>
                  <span>Tous les commentaires</span>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a class="nav-link <?php if ($activePage === 'userComments') { echo 'active'; } ?>" href="?action=userComments">
                  <i class="material-icons">insert_comment</i>
                  <span>Vos commentaires</span>
                </a>
              </li>
               <?php if (stristr($activePage, 'editCommentView')) : ?>
               <li class="nav-item">
                <a class="nav-link active" href="">
                  <i class="material-icons">mode_comment</i>
                  <span>Modifier commentaire</span>
                </a>
              </li>
              <?php endif; ?>               
              <li class="nav-item">
                <a class="nav-link <?php if ($activePage === 'profile') { echo 'active'; } ?>" href="?action=profile">
                  <i class="material-icons">person</i>
                  <span>Profil</span>
                </a>
              </li>                      
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <div class="w-100"></div>
              <ul class="navbar-nav border-left flex-row ">             
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="Content/backend/images/avatars/<?= $_SESSION['auth']['avatar']?>" alt="Avatar">
                    <span class="d-none d-md-inline-block"><?= $_SESSION['auth']['username']?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="?action=profile">
                      <i class="material-icons">&#xE7FD;</i> Profil</a>
                    <?php if($_SESSION['auth']['role'] == 'admin'): ?>  
                    <a class="dropdown-item" href="?action=adminPosts">
                      <i class="material-icons">vertical_split</i> Articles</a>
                    <a class="dropdown-item" href="?action=addPostView">
                      <i class="material-icons">note_add</i> Ajouter un article</a>
                    <?php else : ?>
                    <a class="dropdown-item" href="?action=userComments">
                      <i class="material-icons">insert_comment</i> Vos commentaires</a>
                    <?php endif; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="?action=logout">
                      <i class="material-icons text-danger">&#xE879;</i> Déconnexion </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
  
  <?= $content ?>
  
  	<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#contact">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=posts">Blog</a>
              </li>
            </ul>
          </footer>
        </main>
      </div>
    </div>    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="Content/backend/scripts/extras.1.1.0.min.js"></script>
    <script src="Content/backend/scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="Content/backend/scripts/app/app-blog-overview.1.1.0.js"></script>
  </body>
</html>