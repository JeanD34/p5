<?php 

if($_SESSION['auth']['role'] !== 'admin') {
    $_SESSION['error'] = 'Vous devez disposer des droits administrateurs pour accéder à cette section';
    header("Location: index.php?action=loginView");
}
?>

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
                      <a href="#" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('Content/backend/images/avatars/0.jpg');">Written by Anna Kunis</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a class="text-fiord-blue" href="?action=updateView&id=<?= $post->getId(); ?>"><?= $post->getTitle(); ?></a>
                    </h5>
                    <p class="card-text d-inline-block mb-3"><?= $post->getLead(); ?></p><br>
                    <span class="text-muted">28 February 2019</span>
                    <div class="blog-comments__actions mt-3">
                      <div class="btn-group btn-group-sm">
                      <form method="post" action="?action=updateView&id=<?= $post->getId(); ?>">
                        <button type="submit" class="btn btn-white">
                          <span class="text-success">
                            <i class="material-icons">more_vert</i>
                          </span> Modifier </button>
                      </form>
                      <button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#confirmModal" data-id="<?= $post->getId(); ?>">
                          <span class="text-danger">
                            <i class="material-icons">clear</i>
                          </span> Supprimer </button>
                          <form method="post" action="?action=post&id=<?= $post->getId(); ?>">
                        <button type="submit" class="btn btn-white">
                          <span class="text-light">
                            <i class="material-icons">arrow_right_alt</i>
                          </span> Consulter </button>
                          </form>
                      </div>
                  	</div>                  
            		</div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <!-- End Last Blog Post -->

              <!-- Discussions Component -->
              <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                <div class="card card-small blog-comments">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Commentaires</h6>
                  </div>
                  <div class="card-body p-0">
                  <?php foreach ($commentToValidate as $comment) : ?>
                    <div class="blog-comments__item d-flex p-3">
                      <div class="blog-comments__avatar mr-3">
                        <img src="Content/backend/images/avatars/1.jpg" alt="User avatar" /> </div>
                      <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                          <a class="text-secondary" href="#">Pseudo</a> sur
                          <a class="text-secondary" href="#">Nom Article</a>
                          <span class="text-muted">– il y a "x" jours</span>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted"><?= $comment->getContent(); ?></p>
                        <div class="blog-comments__actions">
                          <div class="btn-group btn-group-sm">
                          <form action="?action=validateComment" method="post">
                          <input type="hidden" name="id" value="<?= $comment->getId(); ?>">
                            <button type="submit" class="btn btn-white">
                              <span class="text-success">
                                <i class="material-icons">check</i>
                              </span> Approuver </button>
                          </form>
                            <button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#commentModal" data-id="<?= $comment->getId(); ?>">
                          <span class="text-danger">
                            <i class="material-icons">clear</i>
                          </span> Rejeter </button>
                          <form action="?action=editComment" method="post">
                          <input type="hidden" name="id" value="<?= $comment->getId(); ?>">
                            <button type="submit" class="btn btn-white">
                              <span class="text-light">
                                <i class="material-icons">more_vert</i>
                              </span> Editer </button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </div>
                  <div class="card-footer border-top">
                    <div class="row">
                      <div class="col text-center view-report">
                        <button type="submit" class="btn btn-white">Voir tous les commentaires</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Discussions Component -->
              
			<!-- Modal Blod Post-->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalTitle">Suppression Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Voulez-vous vraiment supprimer cet article?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                    <form method="post" action="?action=deletePost">
                      <input type="hidden" name="id" id="id" value="">
                        <button type="submit" class="btn btn-white">
                          <span class="text-danger">
                            <i class="material-icons">clear</i>
                          </span> Supprimer </button>
                      </form>                   
                  </div>
                </div>
              </div>
            </div>
            <!-- /Modal -->
            
            <!-- Modal Comment -->
            <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="commentModalTitle">Suppression Commentaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Voulez-vous vraiment rejeter ce commentaire, il sera supprimé ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                    <form method="post" action="?action=deleteComment">
                      <input type="hidden" name="id" id="id" value="">
                        <button type="submit" class="btn btn-white">
                          <span class="text-danger">
                            <i class="material-icons">clear</i>
                          </span> Supprimer </button>
                      </form>                   
                  </div>
                </div>
              </div>
            </div>
            <!-- /Modal -->

            </div>
          </div>
          

