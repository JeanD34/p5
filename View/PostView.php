<?php $this->title = $post->getTitle(); ?>

<div class="main-content paddsection">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
          <div class="row">
            <div class="container-main single-main">
              <div class="col-md-12">
                <div class="block-main mb-30 card-post--1">
                  <div class="card-post__image card-blog-single"><img class="card-img-top" src="Content/images/<?= $post->getImage(); ?>">                  
                    <div class="card-post__author d-flex">
                      <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('Content/backend/images/avatars/<?= $user->getAvatar(); ?>');">Ecrit par <?= $user->getUsername(); ?></a>
                    </div>
                  </div>
                  <div class="content-main single-post padDiv">
                    <div class="journal-txt">
                      <h4 class="mb-4 mt-3"><?= $post->getTitle(); ?></h4>
                    </div>
                    <div class="post-meta">
                      <ul class="list-unstyled mb-0">
                        <li class="author">par:<a href="?action=userProfile&id=<?= $user->getId(); ?>" target="_blank"><?= $user->getUsername(); ?></a></li>
                        <li class="date">date: <?= strftime('%d-%m-%Y', strtotime($post->getAdd_date())); ?></li>
                        <li class="commont"><i class="ion-ios-heart-outline"></i><a href="#comment-block"><?= $nbComment; ?> commentaires</a></li>
                      </ul>
                    </div>
                    <p class="mb-30"><?= $post->getContent(); ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="comments text-left padDiv mb-30">
                  <div class="entry-comments">
                    <h6 class="mb-30"><?= $nbComment; ?> commentaires</h6>
                    <?php if (!empty($comments)) : ?>
                    <?php foreach ($comments as $comment) : ?>
                    <ul class="entry-comments-list list-unstyled">
                      <span class="anchor" id="<?= $comment->getId(); ?>"></span>
                      <li>
                        <div class="entry-comments-item">
                          <img src="Content/backend/images/avatars/<?= $comment->getAvatar(); ?>" class="entry-comments-avatar" alt="<?= $comment->getUsername(); ?>">
                          <div class="entry-comments-body">
                            <span class="entry-comments-author"><a href="?action=userProfile&id=<?= $comment->getId_user_fk(); ?>" target="_blank"><?= $comment->getUsername(); ?></a></span>
                            <span><?= strftime('%d-%m-%Y', strtotime($comment->getAdd_date())); ?> à <?= strftime('%H:%M', strtotime($comment->getAdd_date())); ?></span>
                            <p class="mb-10" id="<?= $comment->getId(); ?>"><?= $comment->getContent(); ?></p>
                          </div>
                        </div>
                      </li>                       
                    </ul>
                    <?php endforeach; ?>
        			      <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php if(isset($_SESSION['auth'])) : ?>
              <div id="comment-block" class="col-lg-12">
                <div class="cmt padDiv">
                <div class="mb-4"><?= $_SESSION['auth']['username']?></div>
                  <?php if(isset($_SESSION['comment'])) : ?>
                  <p class="alert alert-success"><?= $_SESSION['comment']; ?></p>
                  <?php unset($_SESSION['comment']); ?>
                  <?php endif; ?>
                  <?php if(isset($_SESSION['error'])) : ?>
                  <p class="alert alert-danger"><?= $_SESSION['error']; ?></p>
                  <?php unset($_SESSION['error']); ?>
                  <?php endif; ?>
                <div class="mb-4">Les commentaires sont soumis à validation et limités à 1000 caractères.</div>
                  <form id="comment-form" method="post" action="index.php?action=comment" role="form">
                  <input type="hidden" name="id_post_fk" value="<?= $post->getId(); ?>">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <textarea id="form_message" name="content" class="form-control" placeholder="Message *" style="height: 200px;" required></textarea>
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <input type="submit" class="btn btn-defeault btn-send" value="Commenter">
                        </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php else : ?>
              <div class="col-md-12">
            	<div class="comments text-center p-3">
              	<p class="login-comment"><a href="?action=loginView">Inscrivez-vous</a> ou <a href="?action=loginView">connectez vous</a> pour commenter cet article</p>
              </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>