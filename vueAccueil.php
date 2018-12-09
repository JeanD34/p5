<?php $titre = 'Test' ?>

<?php ob_start(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php foreach ($articles as $article) { ?>
			<div class="card mb-4">  
            	<img class="card-img-top" src="image/<?= $article['image']?>">
            	<div class="card-body">
                    <h2 class="card-title"><?= $article['titre']?></h2>
                    <p class="card-text"><?= $article['contenu']?></p>
    			</div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php  require 'gabarit.php'; ?>