<?php $this->title = 'Test - ' . $post->getTitle(); ?>

<div class="main-content paddsection">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
          <div class="row">
            <div class="container-main single-main">
              <div class="col-md-12">
                <div class="block-main mb-30">
                <?php if ($post->getImage() !== null) : ?>
                  <img src="Content/images/<?= $post->getImage(); ?>" class="img-responsive" alt="reviews2">
                  <?php endif; ?>
                  <div class="content-main single-post padDiv">
                    <div class="journal-txt">
                      <h4><a href="#"><?= $post->getTitle(); ?></a></h4>
                    </div>
                    <div class="post-meta">
                      <ul class="list-unstyled mb-0">
                        <li class="author">par:<a href="#">Auteur</a></li>
                        <li class="date">date:<a href="#">Date</a></li>
                        <li class="commont"><i class="ion-ios-heart-outline"></i><a href="#">Nombre de commentaire</a></li>
                      </ul>
                    </div>
                    <p class="mb-30"><?= $post->getContent(); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="comments text-left padDiv mb-30">
                  <div class="entry-comments">
                    <h6 class="mb-30">Doit afficher le nombre de commentaire</h6>
                    <?php if (!empty($comments)) : ?>
                    <?php foreach ($comments as $comment) : ?>
                    <ul class="entry-comments-list list-unstyled">
                      <li>
                        <div class="entry-comments-item">
                          <img src="Content/images/avatar.jpg" class="entry-comments-avatar" alt="">
                          <div class="entry-comments-body">
                            <span class="entry-comments-author">Auteur</span>
                            <span><a href="#">Date et heure</a></span>
                            <p class="mb-10" id="<?= $comment->getId(); ?>"><?= $comment->getContent(); ?></p>
                            <a class="rep" href="#">Repondre</a>
                          </div>
                        </div>                       
                    </ul>
                    <?php endforeach; ?>
        			<?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="cmt padDiv">
                  <form id="comment-form" method="post" action="index.php?action=comment#<?php if(isset($comment)) { echo $comment->getId();} ?>" role="form">
                  <input type="hidden" name="id" value="<?= $post->getId(); ?>">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <textarea id="form_message" name="content" class="form-control" placeholder="Message *" style="height: 200px;" required="required"></textarea>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <input type="submit" class="btn btn-defeault btn-send" value="Commenter">
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>