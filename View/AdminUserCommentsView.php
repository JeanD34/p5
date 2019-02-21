<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Commentaires</span>
            <h3 class="page-title">Tous vos commentaires</h3>
        </div>
    </div>
    <!-- Comments to validate -->
    <div class="col mb-4">
        <div class="card card-small blog-comments">
            <div class="card-header border-bottom">
            	<h6 class="m-0">Vos commentaires publiés</h6>
            </div>
            <div class="card-body p-0">
            	<div class="row">
                    <?php $i = 0; ?>
                    <?php $nbComment = count($userComments);?>
                    <?php foreach ($userComments as $comment) : ?>
                    <?php $content = Validator::validateLength($comment->getContent(), $comment->getId()); ?>
                    <?php $dateComment = new DateTime($comment->getAdd_date()); ?>
                    <?php $now = new DateTime(); ?>
                    <?php $dayComment = $dateComment->diff($now)->format("%d"); ?>    
                        <?php if ($i % 5 == 0) : ?>
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
                        			<span class="text-muted">– il y a <?= $dayComment ?> jours</span>
                   			 	</div>
                    			<p class="m-0 my-1 mb-2 text-muted"><?= $content ?></p>
                        		<div class="blog-comments__actions">
                            		<div class="btn-group btn-group-sm">
                                        <button type="submit" class="btn btn-white confirm" data-toggle="modal" data-target="#commentModal" data-id="<?= $comment->getId(); ?>">
                                            <span class="text-danger">
                                                <i class="material-icons">clear</i>
                                            </span> Supprimer
                                        </button>
                                        <button type="submit" class="btn btn-white">
                                            <span class="text-light">
                                                <i class="material-icons">more_vert</i>
                                            </span>
                                            <a href="?action=editCommentView&id=<?= $comment->getId(); ?>">Editer</a>
                                        </button>
                        			</div>
                        		</div>
                        	</div>
                    	</div>
                        <?php if ($i % 5 == 0 || $i == $nbComment) : ?>
                        	</div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </div>
                    <div class="text-center mb-3 mt-3 paging">
                    <?php if ($pageCV > 1) : ?>
                        <a href="?action=userComments&pageCV=1"><< </a> - <a href="?action=userComments&pageCV=<?= $pageCV - 1; ?>">Page précédente </a> -
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $totalPagesCV; $i++) : ?>
                        <a href="?action=userComments&pageCV=<?php echo $i; ?>"><?= $i; ?></a> 
                    <?php endfor; ?>   	
                    <?php if ($pageCV < $totalPagesCV) : ?>
                        - <a href="?action=userComments&pageCV=<?= $pageCV + 1; ?>">Page suivante</a>
                        - <a href="?action=userComments&pageCV=<?= $totalPagesCV ?>"> >></a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'ModalCommentView.php';?>


    