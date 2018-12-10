<?php $this->titre = 'Test' ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php foreach ($articles as $article) { ?>
			<div class="card mb-4">  
            	<img class="card-img-top" src="contenu/image/<?= $article['image']?>">
            	<div class="card-body">
                    <a href="?action=article&id=<?= $article['id']?>"><h2 class="card-title"><?= $article['titre']?></h2></a>
                    <p class="card-text"><?= $article['contenu']?></p>
    			</div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

