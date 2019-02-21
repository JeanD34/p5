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
                            <a href="?action=userProfile&id=<?= $post->getId_user_fk(); ?>" target="_blank" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('Content/backend/images/avatars/<?= $post->getAvatar(); ?>');">Ecrit par <?= $post->getUsername(); ?></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-fiord-blue" href="?action=updateView&id=<?= $post->getId(); ?>"><?= $post->getTitle(); ?></a>
                        </h5>
                        <p class="card-text d-inline-block mb-3"><?= $post->getLead(); ?></p><br>
                        <span class="text-muted"><?= ucfirst(utf8_encode(strftime('%A %e %B %Y', strtotime($post->getAdd_date())))); ?></span>
                        <div class="blog-comments__actions mt-3">
                            <div class="btn-group btn-group-sm">
                                <button type="submit" class="btn btn-white">
                                    <span class="text-success">
                                        <i class="material-icons">more_vert</i>
                                    </span>
                                    <a href="?action=updateView&id=<?= $post->getId(); ?>">Modifier</a>
                                </button>
                                <button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#confirmModal" data-id="<?= $post->getId(); ?>">
                                    <span class="text-danger">
                                        <i class="material-icons">clear</i>
                                    </span>
                                    <a href="">Supprimer</a>
                                </button>                     
                                <button type="submit" class="btn btn-white">
                                    <span class="text-light">
                                        <i class="material-icons">arrow_right_alt</i>
                                    </span>
                                    <a href="?action=post&id=<?= $post->getId(); ?>" target="_blank">Consulter</a>
                                </button>
                            </div>
                        </div>                  
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-3 mb-5 paging">
        <?php if ($page > 1) : ?>
            <a href="?action=posts&page=1"><< </a> - <a href="?action=posts&page=<?= $page - 1; ?>">Page précédente </a> -
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?action=posts&page=<?php echo $i; ?>"><?= $i; ?></a> 
        <?php endfor;?>   	
        <?php if ($page < $totalPages) : ?>
            - <a href="?action=posts&page=<?= $page + 1; ?>">Page suivante</a>
            - <a href="?action=posts&page=<?= $totalPages ?>"> >></a>
        <?php endif; ?>
    </div>
</div>  
<?php include_once 'ModalPostView.php';?>
