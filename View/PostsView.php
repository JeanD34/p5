<?php $this->title = 'Tous les articles'; ?>

<div id="journal-blog" class="text-left paddsections">
    <div class="container">
        <div class="section-title text-center">
            <h2>blog</h2>
        </div>
    </div>
    <div class="container">
        <div class="journal-block">
            <div class="row">
                <?php foreach ($posts as $post) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card card-small card-post card-post--1">
                        <div class="card-post__image" style="background-image: url('Content/images/<?= $post->getImage(); ?>');">                  
                            <div class="card-post__author d-flex">
                                <a href="?action=userProfile&id=<?= $post->getId_user_fk(); ?>" class="card-post__author-avatar card-post__author-avatar--small" style="background-image: url('Content/backend/images/avatars/<?= $post->getAvatar(); ?>');">Ecrit par <?= $post->getUsername(); ?></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="text-fiord-blue" href="?action=post&id=<?= $post->getId(); ?>"><?= $post->getTitle(); ?></a>
                            </h5>
                            <p class="card-text d-inline-block mb-3"><?= $post->getLead(); ?></p><br>
                            <span class="text-muted"><?= ucfirst(utf8_encode(strftime('%A %e %B %Y', strtotime($post->getAdd_date())))); ?></span>                   
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>         	
            </div>
            <div class="text-center mt-5 paging">
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
    </div>
</div>


