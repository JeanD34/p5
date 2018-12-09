<?php $titre = 'Test - ' . $article['titre']?>
<?php ob_start(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">  
            	<img class="card-img-top" src="image/<?= $article['image']?>">
            	<div class="card-body">
                    <a href="article.php?=<?= $article['id']?>"><h2 class="card-title"><?= $article['titre']?></h2></a>
                    <p class="card-text"><?= $article['contenu']?></p>
    			</div>
            </div>
        </div>
    </div>
</div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php';?>