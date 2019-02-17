<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Vue d'ensemble</span>
                <h3 class="page-title">Profil de <?= $user->getUsername(); ?></h3>
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
            </div>
        </div>