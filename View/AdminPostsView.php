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
                <span class="text-uppercase page-subtitle">Article</span>
                <h3 class="page-title">Tous les articles</h3>
              </div>
            </div>

            <div class="row">
            	<?php foreach ($posts as $post) : ?>
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
                      </form>                      
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
            <div>
            	<?php if ($page > 1) : ?>
                <a href="?action=adminPosts&page=<?= $page - 1; ?>">Page précédente -</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?action=adminPosts&page=<?php echo $i; ?>"><?php echo $i; ?></a> 
                <?php endfor;?>   	
                <?php if ($page < $totalPages) : ?>
        		— <a href="?action=adminPosts&page=<?php echo $page + 1; ?>">Page suivante</a>
        		<?php endif; ?>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalTitle">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Voulez vous vraiment supprimer cet article?
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
