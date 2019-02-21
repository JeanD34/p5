<!-- Modal User Post-->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalTitle">Suppression Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer cet utilisateur?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                <form method="post" action="?action=deleteUser">
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