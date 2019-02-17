  <?php $this->title = 'Accueil'; ?>
  
  <!-- start section header -->
  <div id="header" class="home">

    <div class="container">
      <div class="header-content">
        <h1>Je suis <span class="typed"></span></h1>
        <p>développeur</p>

        <ul class="list-unstyled list-social">
          <li><a href="https://twitter.com/Jean_Descorps"><i class="ion-social-twitter"></i></a></li>
          <li><a href="https://linkedin.com/in/jeandescorps/"><i class="ion-social-linkedin"></i></a></li>
          <li><a href="https://github.com/JeanD34"><i class="ion-social-github"></i></a></li>
        </ul>
    	<div class="down text-center"><a class="down" href="#about"><i class="fa fa-angle-down fa-5x"></i></a></div>
      </div>
      
    </div>
    
  </div>
  <!-- End section header -->
  
  <!-- start section about us -->
  <div id="about" class="paddsection">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-lg-4 col-9" style="margin: auto;">
			<img class="div-img-bg" src="Content/images/logo-about.png" alt="logo">
        </div>

        <div class="col-lg-7">
          <div class="about-descr">

            <p class="p-heading">Actuellement en formation <a href="symfony.pdf" target="_blank">"Développeur d'application - PHP / Symfony"</a> au sein de l'école en ligne <a href="https://openclassrooms.com/" target="_blank">OpenClassrooms</a>. Cette formation me permettra de maitriser le framework Symfony et d'obtenir un titre de <a href="http://www.rncp.cncp.gouv.fr/grand-public/visualisationFiche?format=fr&fiche=27099" target="_blank">"Développeur d'application"</a> de niveau II, équivalent à un bac +3/4. </p>
            <p class="separator">J'ai également obtenu un titre de <a href="http://www.rncp.cncp.gouv.fr/grand-public/visualisationFiche?format=fr&fiche=5927" target="_blank">"Développeur Logiciel"</a> de niveau III (équivalent Bac+2) en 2017, à l'institut de formation <a href="http://www.objectif3w.com/" target="_blank">Objectif3W</a> en suivant leur cursus <a href="webdev.pdf" target="_blank">"WEBDEV"</a>.</p>

          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- end section about us -->


  <!-- start section services -->
  <div id="services">
    <div class="container">

        <div class="services-carousel owl-theme">

          <div class="services-block">

            <i class="ion-hammer"></i>
            <span>PHP</span>
            <p class="separator">PHP est un langage de programmation libre, considéré comme une des bases de la création de sites web dits dynamiques mais également des applications web.</p>

          </div>

          <div class="services-block">

            <i class="ion-archive"></i>
            <span>SQL</span>
            <p class="separator">SQL est un langage informatique normalisé servant à exploiter des bases de données relationnelles.</p>

          </div>

          <div class="services-block">

            <i class="ion-social-html5-outline"></i>
            <span>HTML</span>
            <p class="separator">L’HyperText Markup Language, généralement abrégé HTML, est le langage de balisage conçu pour représenter les pages web.</p>

          </div>

          <div class="services-block">

            <i class="ion-social-css3-outline"></i>
            <span>CSS</span>
            <p class="separator">Les feuilles de style en cascade, généralement appelées CSS de l'anglais Cascading Style Sheets, forment un langage informatique qui décrit la présentation des documents HTML et XML.</p>

          </div>

          <div class="services-block">

            <i class="ion-social-javascript-outline"></i>
            <span>JavaScript</span>
            <p class="separator">JavaScript est un langage de programmation de scripts principalement employé dans les pages web interactives mais aussi pour les serveurs avec l'utilisation (par exemple) de Node.js.</p>

          </div>

          <div class="services-block">

            <i class="ion-ios-cog-outline"></i>
            <span>Symfony</span>
            <p class="separator">Symfony est un ensemble de composants PHP ainsi qu'un framework MVC libre écrit en PHP. Il fournit des fonctionnalités modulables et adaptables qui permettent de faciliter et d’accélérer le développement d'un site web.</p>

          </div>

        </div>

    </div>

  </div>

  <!-- start section journal -->
  <div id="journal" class="text-left paddsection">

    <div class="container">
      <div class="section-title text-center">
        <h2>derniers Articles</h2>
      </div>
    </div>

    <div class="container">
      <div class="journal-block">
        <div class="row">
			<?php foreach ($posts as $post) : ?>	
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small card-post card-post--1">
                  <div class="card-post__image" style="background-image: url('Content/images/<?= $post->getImage(); ?>');">                  
                    <div class="card-post__author d-flex">
                      <a href="?action=userProfile&id=<?= $post->getId_user_fk(); ?>" target="_blank" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('Content/backend/images/avatars/<?= $post->getAvatar(); ?>');">Ecrit par <?= $post->getUsername(); ?></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a class="text-fiord-blue" href="?action=post&id=<?= $post->getId(); ?>"><?= $post->getTitle(); ?></a>
                    </h5>
                    <p class="card-text d-inline-block mb-3"><?= $post->getLead(); ?></p><br>
                    <span class="text-muted"><?= ucfirst(utf8_encode(strftime('%A %e %B %Y', strtotime($post->getAdd_date())))); ?></span>                   
            		</div>
                </div>
              </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
	<div class="container">
      <div class="section-title text-center">
        <h2><a href="?action=posts">tous les articles</a></h2>
      </div>
    </div>
  </div>
  <!-- End section journal -->


  <!-- start sectoion contact -->
  <div id="contact" class="paddsection">
    <div class="container">
      <div class="contact-block1">
        <div class="row">

          <div class="col-lg-6">
            <div class="contact-contact">

              <h2 class="mb-30">CONTACTEZ-MOI</h2>

              <ul class="contact-details">
                <li><span>Montpellier</span></li>
                <li><span>France</span></li>
                <li><span>0671095219</span></li>
                <li><span>jean.webdev@gmail.com</span></li>
              </ul>

            </div>
          </div>

          <div class="col-lg-6">
            <form action="" method="post" role="form" class="contactForm">
              <div class="row">

                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="col-lg-6">
                  <div class="form-group contact-block1">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Votre Prénom"/>
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email"/>
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet"/>
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" id="message" rows="12" placeholder="Message"></textarea>
                    <div class="validation"></div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <input type="submit" class="btn" value="Envoyer le message">
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- start section contact -->


  