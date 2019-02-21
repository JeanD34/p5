<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Panneau d'administration</span>
                <h3 class="page-title">Vue d'ensemble</h3>
              </div>
            </div>
            <!-- End Page Header -->
            
            <!-- Last Blog Post -->
            <div class="row">
            	<?php foreach ($postList as $post) : ?>
              <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card card-small card-post card-post--1">
                  <div class="card-post__image" style="background-image: url('Content/images/<?= $post->getImage(); ?>');">                  
                    <div class="card-post__author d-flex">
                      <a href="?action=userProfile&id=<?= $post->getId_user_fk(); ?>" target="_blank" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('Content/backend/images/avatars/<?= $post->getAvatar(); ?>');">Ecrit par <?= $post->getUsername(); ?></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a class="text-fiord-blue" href="?action=updateView&id=<?= $post->getId(); ?>" target="_blank"><?= $post->getTitle(); ?></a>
                    </h5>
                    <p class="card-text d-inline-block mb-3"><?= $post->getLead(); ?></p><br>
                    <span class="text-muted"><?= ucfirst(utf8_encode(strftime('%A %e %B %Y', strtotime($post->getAdd_date())))); ?></span>
                    <div class="blog-comments__actions mt-3">
                      <div class="btn-group btn-group-sm">
                        <button type="submit" class="btn btn-white">
                          <span class="text-success">
                            <i class="material-icons">more_vert</i>
                          </span> <a href="?action=updateView&id=<?= $post->getId(); ?>">Modifier</a> </button>
                      	<button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#confirmModal" data-id="<?= $post->getId(); ?>">
                          <span class="text-danger">
                            <i class="material-icons">clear</i>
                          </span> Supprimer </button>
                          <a href="?action=post&id=<?= $post->getId(); ?>" target="_blank">
                    		<button class="btn btn-white">
                              <span class="text-light">
                                <i class="material-icons">arrow_right_alt</i>
                              </span>
                              Consulter
                          	</button>
                          </a>
                      </div>
                  	</div>                  
            		</div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <!-- End Last Blog Post -->

              <!-- Discussions Component -->
              <div class="row">
                  <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                    <div class="card card-small blog-comments">
                      <div class="card-header border-bottom">
                        <h6 class="m-0">Commentaires en attente de validation</h6>
                      </div>
                      <div class="card-body p-0">
                      <?php foreach ($commentToValidate as $comment) : ?>
                      <?php 
                      $content = Validator::validateLength($comment->getContent(), $comment->getId());
                      $dateComment = new DateTime($comment->getAdd_date());
                      $now = new DateTime();
                      $dayComment = $dateComment->diff($now)->format("%d");    
                      ?>
                        <div class="blog-comments__item d-flex p-3">
                          <div class="blog-comments__avatar mr-3">
                            <img src="Content/backend/images/avatars/<?= $comment->getAvatar(); ?>" alt="Avatar" /> </div>
                          <div class="blog-comments__content">
                            <div class="blog-comments__meta text-muted">
                              <a class="text-secondary" href="?action=userProfile&id=<?= $comment->getId_user_fk(); ?>"><?= $comment->getUsername(); ?></a> sur
                              <a class="text-secondary" href="?action=post&id=<?= $comment->getId_post_fk(); ?>" target="_blank"><?= $comment->getTitle(); ?></a>
                              <span class="text-muted">– il y a <?= $dayComment ?> jours</span>
                            </div>
                            <p class="m-0 my-1 mb-2 text-muted"><?= $content ?></p>
                            <div class="blog-comments__actions">
                              <div class="btn-group btn-group-sm">
                              	<button type="submit" class="btn btn-white">
                              	<span class="text-success">
            					<i class="material-icons">check</i>
       						 	</span> <a href="?action=validateComment&id=<?= $comment->getId(); ?>">Approuver</a> </button>
                                <button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#commentModal" data-id="<?= $comment->getId(); ?>">
                              	<span class="text-danger">
                                <i class="material-icons">clear</i>
                              	</span> Rejeter </button>
                                <button type="submit" class="btn btn-white">
                                  <span class="text-light">
                                    <i class="material-icons">more_vert</i>
                                  </span> <a href="?action=editCommentView&id=<?= $comment->getId(); ?>">Editer</a> </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endforeach; ?>
                      </div>
                      <div class="card-footer border-top">
                        <div class="row">
                          <div class="col text-center view-report">
                          <form action="?action=adminComments" method="post">
                            <button type="submit" class="btn btn-white">Voir tous les commentaires</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- End Discussions Component -->
			<?php include_once 'ModalCommentView.php';?>
			<?php include_once 'ModalPostView.php';?>
            </div>
          </div>
          

