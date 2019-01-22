  <?php $this->title = 'Accueil'?>
  
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
      </div>
    </div>
  </div>
  <!-- End section header -->
  
  <!-- start section about us -->
  <div id="about" class="paddsection">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-lg-4">
			<img class="div-img-bg" height="350px" width="350px" src="Content/images/logo-about.png" class="img-responsive" alt="logo">
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

            <i class="ion-ios-browsers-outline"></i>
            <span>UI/UX DESIGN</span>
            <p class="separator">To an English person, it will seem like simplified English,told me what </p>

          </div>

          <div class="services-block">

            <i class="ion-ios-lightbulb-outline"></i>
            <span>BRAND IDENTITY</span>
            <p class="separator">To an English person, it will seem like simplified English,told me what </p>

          </div>

          <div class="services-block">

            <i class="ion-ios-color-wand-outline"></i>
            <span>WEB DESIGN</span>
            <p class="separator">To an English person, it will seem like simplified English,told me what </p>

          </div>

          <div class="services-block">

            <i class="ion-social-android-outline"></i>
            <span>MOBILE APPS</span>
            <p class="separator">To an English person, it will seem like simplified English,told me what </p>

          </div>

          <div class="services-block">

            <i class="ion-ios-analytics-outline"></i>
            <span>Analytics</span>
            <p class="separator">To an English person, it will seem like simplified English,told me what </p>

          </div>

          <div class="services-block">

            <i class="ion-ios-camera-outline"></i>
            <span>PHOTOGRAPHY</span>
            <p class="separator">To an English person, it will seem like simplified English,told me what </p>

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
          <div class="col-lg-4 col-md-6">
            <div class="journal-info">
				<?php if (!empty($post->getImage())) : ?>
              <a href="?action=post&id=<?= $post->getId(); ?>"><img src="Content/images/<?= $post->getImage(); ?>" class="img-responsive" alt="img"></a>
				<?php endif; ?>
              <div class="journal-txt">

                <h4><a href="?action=post&id=<?= $post->getId(); ?>"><?= $post->getTitle(); ?></a></h4>
                <p class="separator"><?= $post->getLead(); ?>
                </p>

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


  