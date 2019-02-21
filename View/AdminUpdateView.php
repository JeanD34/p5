<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Article</span>
            <h3 class="page-title">Modifier un article</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-12">
        <!-- Add New Post Form -->
            <div class="card card-small mb-3">
            <div class="card-body">
            <form class="add-new-post" method="post" action="index.php?action=updatePost" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= htmlspecialchars($post->getId()); ?>">
                <input class="form-control form-control-lg mb-3" type="text" name="title" value="<?= htmlspecialchars($post->getTitle()); ?>">
                <input class="form-control form-control-lg mb-3" type="text" name="lead" value="<?= htmlspecialchars($post->getLead()); ?>">
                <input class="form-control form-control-lg mb-3" type="file" name="image">
                <p class="mb-3">Image actuelle de l'article :</p>
                <img class="mb-3" src="./Content/images/<?= htmlspecialchars($post->getImage()); ?>"width="50%" height="50%">
                <textarea class="form-control form-control-lg mb-3"  rows="10" name="content"><?= htmlspecialchars($post->getContent()); ?></textarea>
                <button type="submit" class="btn btn-sm btn-accent ml-auto">
                    <i class="material-icons">file_copy</i>Modifier article
                </button>
            </form>
            </div>
        </div>                
    </div>
    <!-- / Add New Post Form -->
</div>
