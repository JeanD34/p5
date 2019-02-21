<!-- Modal Blog Post-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalTitle">Suppression Article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Voulez-vous vraiment supprimer cet article?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                <form method="post" action="?action=deletePost">
                    <input type="hidden" name="id" id="id" value="">
                    <button type="submit" class="btn btn-white">
                        <span class="text-danger">
                            <i class="material-icons">clear</i>
                        </span> Supprimer
                    </button>
                </form>                   
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->