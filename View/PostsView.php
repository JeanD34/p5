<?php $this->title = 'Test'; ?>

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
        <div class="col-lg-4 col-md-6">
            <div class="journal-info mb-30">
				<?php if ($post->getImage() !== null) : ?>
              <a href="?action=post&id=<?= $post->getId();?>"><img src="Content/images/<?= $post->getImage(); ?>" class="img-responsive" alt="img"></a>
				<?php endif; ?>
              <div class="journal-txt">
                <h4><a href="?action=post&id=<?= $post->getId();?>"><?= $post->getTitle(); ?></a></h4>
                <p class="separator"><?= $post->getLead(); ?>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>         	
        </div>
        <?php if ($page > 1) : ?>
        <a href="?action=posts&page=<?= $page - 1; ?>">Page précédente -</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?action=posts&page=<?php echo $i; ?>"><?= $i; ?></a> 
        <?php endfor;?>   	
        <?php if ($page < $totalPages) : ?>
		— <a href="?action=posts&page=<?= $page + 1; ?>">Page suivante</a>
		<?php endif; ?>
      </div>
    </div>
  </div>


