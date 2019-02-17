<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Commentaire</span>
                <h3 class="page-title">Modifier un commentaire</h3>
              </div>
            </div>
			<div class="row">
              <div class="col-lg-9 col-md-12">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                  <div class="card-body">
                    <form class="add-new-post" method="post" action="index.php?action=editComment">
                		<input type="hidden" name="id" value="<?= $comment->getId();?>">
                    <div class="mb-3">Après mise à jour, votre commentaire sera re-soumis à validation.</div>
                		<textarea class="form-control form-control-lg mb-3"  rows="10" name="content"><?= $comment->getContent(); ?></textarea>
                		<button type="submit" class="btn btn-sm btn-accent ml-auto">
                          <i class="material-icons">file_copy</i>Modifier commentaire</button>
                    </form>
                  </div>
                </div>                
              </div>
              </div>
				<!-- / Add New Post Form -->

</div>