<div class="main-content-container container-fluid px-4">
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Article</span>
            <h3 class="page-title">Ajouter un article</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form class="add-new-post" method="post" action="index.php?action=addPost" enctype="multipart/form-data">
                        <input class="form-control form-control-lg mb-3" type="text" name="title" placeholder="Titre">
                        <input class="form-control form-control-lg mb-3" type="text" name="lead" placeholder="Chapô">
                        <p>Les dimensions idéales de l'image sont 800X600. Une image par défaut sera associée à l'article si vous n'en choisissez pas.</p>
                        <input class="form-control form-control-lg mb-3" type="file" name="image">
                        <textarea class="form-control form-control-lg mb-3"  rows="10" name="content" placeholder="Contenu de l'article"></textarea>
                        <button type="submit" class="btn btn-sm btn-accent ml-auto">
                        	<i class="material-icons">file_copy</i>Ajouter article</button>
                    </form>
                </div>
            </div>
            <!-- / Add New Post Form -->                
        </div>        
    </div>
</div>

