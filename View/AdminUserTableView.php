<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Utilisateurs</span>
                <h3 class="page-title">Tous les utilisateurs</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Utilisateurs actifs</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table table-responsive-md mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Nom Utilisateur</th>
                          <th scope="col" class="border-0">Adresse Email</th>
                          <th scope="col" class="border-0">Website</th>
                          <th scope="col" class="border-0">Date Inscription</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($activatedUsers as $user) : ?>
                        <tr>
                          <td><?= $user->getId(); ?></td>
                          <td><?= $user->getUsername(); ?></td>
                          <td><?= $user->getEmail(); ?></td>
                          <td><?= $user->getWebsite(); ?></td>
                          <td><?= $user->getInscription_date(); ?></td>
                          <td><button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#userModal" data-id="<?= $user->getId(); ?>">
                          <span class="text-danger">
                            <i class="material-icons">clear</i>
                          </span> Supprimer </button></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                    <div class="text-center paging paging-user">
            <?php if ($pageUINV > 1) : ?>
        <a href="?action=userTable&pageUINV=1"><< </a> - <a href="?action=userTable&pageUINV=<?= $pageUINV - 1; ?>">Page précédente </a> -
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPagesUINV; $i++): ?>
        <a href="?action=userTable&pageUINV=<?php echo $i; ?>"><?= $i; ?></a> 
        <?php endfor;?>   	
        <?php if ($pageUINV < $totalPagesUINV) : ?>
		- <a href="?action=userTable&pageUINV=<?= $pageUINV + 1; ?>">Page suivante</a>
    - <a href="?action=userTable&pageUINV=<?= $totalPagesUINV ?>"> >></a>
		<?php endif; ?>
            </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
            <!-- Default Dark Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small overflow-hidden mb-4">
                  <div class="card-header bg-dark">
                    <h6 class="m-0 text-white">Utilisateurs inactifs</h6>
                  </div>
                  <div class="card-body p-0 pb-3 bg-dark text-center">
                    <table class="table table-dark table-responsive-md mb-0">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col" class="border-bottom-0">#</th>
                          <th scope="col" class="border-bottom-0">Nom Utilisateur</th>
                          <th scope="col" class="border-bottom-0">Adresse Email</th>
                          <th scope="col" class="border-bottom-0">Website</th>
                          <th scope="col" class="border-bottom-0">Date Inscription</th>
                          <th scope="col" class="border-bottom-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($inactiveUsers as $user) : ?>
                        <tr>
                          <td><?= $user->getId(); ?></td>
                          <td><?= $user->getUsername(); ?></td>
                          <td><?= $user->getEmail(); ?></td>
                          <td><?= $user->getWebsite(); ?></td>
                          <td><?= $user->getInscription_date(); ?></td>
                          <td><button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#userModal" data-id="<?= $user->getId(); ?>">
                          <span class="text-danger">
                            <i class="material-icons">clear</i>
                          </span> Supprimer </button></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                    <div class="text-center paging paging-user">
            <?php if ($pageUINV > 1) : ?>
        <a href="?action=userTable&pageUINV=1"><< </a> - <a href="?action=userTable&pageUINV=<?= $pageUINV - 1; ?>">Page précédente </a> -
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPagesUINV; $i++): ?>
        <a href="?action=userTable&pageUINV=<?php echo $i; ?>"><?= $i; ?></a> 
        <?php endfor;?>   	
        <?php if ($pageUINV < $totalPagesUINV) : ?>
		- <a href="?action=userTable&pageUINV=<?= $pageUINV + 1; ?>">Page suivante</a>
    - <a href="?action=userTable&pageUINV=<?= $totalPagesUINV ?>"> >></a>
		<?php endif; ?>
            </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php include_once 'ModalUserView.php';?>