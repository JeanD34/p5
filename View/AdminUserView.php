<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Vue d'ensemble</span>
                <h3 class="page-title">Profil Utilisateur</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="Content/backend/images/avatars/<?= $user->getAvatar(); ?>" alt="Avatar" width="110"> 
                  	</div>
                    <h4 class="mb-0"><?= $user->getUsername(); ?></h4>
                    <span class="text-muted d-block mb-2"><?= $user->getEmail(); ?></span>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                        <strong class="text-muted d-block mb-2">Website</strong>
                      <span><?= $user->getWebsite(); ?></span>                      
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span><?= $user->getDescription(); ?></span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Détails de votre compte</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                            <form>
                            	<div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="username">Pseudo</label>
                                        <input type="text" class="form-control" id="username" placeholder="Pseudo" value="<?= $user->getUsername();?>"> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Email" value="<?= $user->getEmail(); ?>"> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" class="form-control" id="password" placeholder="Mot de passe" value="<?= $user->getPassword(); ?>"> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="site">Website</label>
                                        <input type="text" class="form-control" id="site" placeholder="Website" value="<?= $user->getWebsite(); ?>"> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" class="form-control" id="avatar"> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    	<label for="description">Description</label>
    									<textarea class="form-control" id="description" rows="5" cols=""><?= $user->getDescription(); ?></textarea> 
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                    	<button type="submit" class="btn btn-accent">Mettre à jour</button>   
                                    </div>
                                </div>                           
                            </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            
              <!-- End Default Light Table -->
              <!-- Discussions Component -->

                  <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                    <div class="card card-small blog-comments">
                      <div class="card-header border-bottom">
                        <h6 class="m-0">Vos derniers commentaires</h6>
                      </div>
                      <div class="card-body p-0">
                      <?php foreach ($userComments as $comment) : ?>
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
                                <button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#commentModal" data-id="<?= $comment->getId(); ?>">
                              	<span class="text-danger">
                                <i class="material-icons">clear</i>
                              	</span> Supprimer </button>
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
                          <form action="?action=adminUserComments" method="post">
                            <button type="submit" class="btn btn-white">Voir tous vos commentaires</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              <!-- End Discussions Component -->
            </div>
            </div>
          
<?php include_once 'ModalCommentView.php';?>
