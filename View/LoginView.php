<div class="container paddsections">
<?php 
if(isset($_REQUEST['error'])) {
    $error = $_REQUEST['error'];
}
if(isset($error)) {
    echo $error;
}
?>
    <div class="row justify-content-center login-logo">
        <img src="Content/images/login.png">
    </div>
    <div class="row">       	
        <div class="col-6">
        <h2>S'inscrire</h2>
            <form action="?action=addUser" method="post">
              <div class="form-group">
                <label for="username">Pseudo</label>
                <input type="text" class="form-control" id="username" name="username" autocomplete="username" placeholder="Pseudo">   
              </div>
              <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="username" placeholder="Email">   
              </div>
              <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" placeholder="Mot de passe">
              </div>       
              <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
            <?php if(isset($validMsg)) : ?>
            <?= $validMsg; ?>
            <?php endif; ?>
        </div>
        <div class="col-6">
        <h2>Se connecter</h2>
            <form action="?action=login" method="post">
            <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
              <div class="form-group">
                <label for="current-username">Pseudo</label>
                <input type="text" class="form-control" id="current-username" name="username" autocomplete="username" placeholder="Pseudo">   
              </div>
              <div class="form-group">
                <label for="current-password">Mot de Passe</label>
                <input type="password" class="form-control" id="current-password" name="password" autocomplete="current-password" placeholder="Mot de passe">
              </div>
              <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
    	</div>
    </div>
</div>