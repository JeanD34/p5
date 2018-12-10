<?php $this->titre = 'Test - ' . $article['titre']?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-4">  
            	<img class="card-img-top" src="contenu/image/<?= $article['image']?>">
            	<div class="card-body">
                   <h2 class="card-title"><?= $article['titre']?></h2>
                    <p class="card-text"><?= $article['contenu']?></p>
    			</div>
            </div>
        </div>
    </div>
</div>
