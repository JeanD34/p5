<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Commentaires</span>
            <h3 class="page-title">Tous les commentaires</h3>
        </div>
    </div>
    <!-- Comments to validate -->
    <div class="col mb-4">
        <div class="card card-small blog-comments">
            <div class="card-header border-bottom">
            	<h6 class="m-0">Commentaires à valider</h6>
            </div>
            <div class="card-body p-0">
            	<div class="row">
                    <?php $i = 0; ?>
                    <?php $nbInvaComment = count($invalidateComments);?>
                    <?php foreach ($invalidateComments as $comment) : ?>
                    <?php 
                    $dateCommentInv = new DateTime($comment->getAdd_date());
                    $now = new DateTime();
                    $dayCommentInv = $dateCommentInv->diff($now)->format("%d");
                    ?>
                        <?php if ($i % 3 == 0) : ?>
                        	<div class="col-lg-4 col-md-6 col-sm-12">
                        <?php endif; ?>                
                    	<?php $i++; ?>                  
                    	<div class="blog-comments__item d-flex p-3">
                            <div class="blog-comments__avatar mr-3">
                            	<img src="Content/backend/images/avatars/<?= $comment->getAvatar(); ?>" alt="Avatar" /> 
                            </div>
                        	<div class="blog-comments__content">
                        		<div class="blog-comments__meta text-muted">
                                    <a class="text-secondary" target="_blank" href="?action=userProfile&id=<?= $comment->getId_user_fk(); ?>"><?= $comment->getUsername(); ?></a> sur
                                    <a class="text-secondary" target="_blank" href="?action=post&id=<?= $comment->getId_post_fk(); ?>"><?= $comment->getTitle(); ?></a>
                        			<span class="text-muted">– il y a <?= $dayCommentInv ?> jours</span>
                   			 	</div>
                    			<p class="m-0 my-1 mb-2 text-muted"><?= $comment->getContent(); ?></p>
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
                        <?php if ($i % 3 == 0 || $i == $nbInvaComment) : ?>
                        	</div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                    <div class="text-center mb-3 mt-3 paging">
            <?php if ($pageCINV > 1) : ?>
        <a href="?action=adminComments&pageCINV=1"><< </a> - <a href="?action=adminComments&pageCINV=<?= $pageCINV - 1; ?>">Page précédente </a> -
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPagesCINV; $i++): ?>
        <a href="?action=adminComments&pageCINV=<?php echo $i; ?>"><?= $i; ?></a> 
        <?php endfor;?>   	
        <?php if ($pageCINV < $totalPagesCINV) : ?>
		- <a href="?action=adminComments&pageCINV=<?= $pageCINV + 1; ?>">Page suivante</a>
    - <a href="?action=adminComments&pageCINV=<?= $totalPagesCINV ?>"> >></a>
		<?php endif; ?>
            </div>
                </div>
            </div>
        </div>

    
    <!-- End -->
    <!-- Validate Comments -->
    <div id="commentVal" class="col mb-4">
        <div class="card card-small blog-comments">
            <div class="card-header border-bottom">
            	<h6 class="m-0">Commentaires publiés</h6>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    <?php $i = 0; ?>
                    <?php $nbVaComment = count($validateComments);?>
                    <?php foreach ($validateComments as $comment) : ?>
                    <?php 
                    $dateCommentVal = new DateTime($comment->getAdd_date());
                    $now = new DateTime();
                    $dayCommentVal = $dateCommentVal->diff($now)->format("%d");
                    ?>
                        <?php if ($i % 3 == 0) : ?>
                    		<div class="col-lg-4 col-md-6 col-sm-12">
                        <?php endif; ?>                
                    	<?php $i++; ?>
                        <div class="blog-comments__item d-flex p-3">
                            <div class="blog-comments__avatar mr-3">
                            	<img src="Content/backend/images/avatars/<?= $comment->getAvatar(); ?>" alt="Avatar" /> 
                            </div>
                            <div class="blog-comments__content">
                                <div class="blog-comments__meta text-muted">
                                    <a class="text-secondary" target="_blank" href="?action=userProfile&id=<?= $comment->getId_user_fk(); ?>"><?= $comment->getUsername(); ?></a> sur
                                    <a class="text-secondary" target="_blank" href="?action=post&id=<?= $comment->getId_post_fk(); ?>#<?= $comment->getId(); ?>"><?= $comment->getTitle(); ?></a>
                                    <span class="text-muted">– il y a <?= $dayCommentVal ?> jours</span>
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
                        <?php if ($i % 3 == 0 || $i == $nbVaComment) : ?>
                        	</div>
                        <?php endif; ?>
                    <?php endforeach; ?>
    				
            	</div>
                <div class="text-center mb-3 mt-3 paging">
            <?php if ($pageCV > 1) : ?>
        <a href="?action=adminComments&pageCV=1#commentVal"><< </a> - <a href="?action=adminComments&pageCV=<?= $pageCV - 1; ?>#commentVal">Page précédente </a> -
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPagesCV; $i++): ?>
        <a href="?action=adminComments&pageCV=<?php echo $i; ?>#commentVal"><?= $i; ?></a> 
        <?php endfor;?>   	
        <?php if ($pageCV < $totalPagesCV) : ?>
		- <a href="?action=adminComments&pageCV=<?= $pageCV + 1; ?>#commentVal">Page suivante</a>
    - <a href="?action=adminComments&pageCV=<?= $totalPagesCV ?>#commentVal"> >></a>
		<?php endif; ?>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'ModalCommentView.php';?>
    <!-- End -->