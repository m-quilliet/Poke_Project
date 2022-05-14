<form class="col-md-9" method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
    <div class="mb-3">
        <label for="mail" class="form-label">Email </label>
        <input type="email" class="form-control" id="mail" name="mail" value="<?=$user->getMail()?>">
        <p id="errorMail"></p>
    </div>
    <div class="row">
        <div class="mb-3 col-6">
            <label for="password" class="form-label">Mot de passe</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" name="password">
                <span class="input-group-text" id="passwordShow"><i id="showPass" class="bi bi-eye-fill"></i></span>
            </div>
        </div>
        <div class="mb-3 col-6">
            <label for="password2" class="form-label">Confirmation de mot de passe</label>
            <input type="password" class="form-control" id="password2" name="password2">
        </div>
    </div>
    <div class="mb-3">
        <label for="login" class="form-label">Nom </label>
        <input type="text" class="form-control" id="login" name="login" value="<?=$user->getLogin()?>">
    </div>
    <button type="submit" class="btn btn-primary"href="/controllers/homeCtrl.php"><?=!$user->getId() ? "S'inscrire": 'Modification'?></button>
    <?php
    if(!$user->getId()){ 
    ?>
    <a class="btn btn-secondary" href="/controllers/signinCtrl.php">Déjà un compte ?</a>
    <?php } ?>

</form>