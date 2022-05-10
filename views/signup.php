<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Connexion</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <form class="col-md-9" method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
                <?php if (isset($errorsArray['Connection'])) { ?>
                    <div class="alert alert-danger">
                        <?= $errorsArray['Connection'] ?>
                    </div>
                <?php } ?>
                <div class="mb-3">
                    <label for="mail" class="form-label">mail :</label>
                    <input type="email" class="form-control" id="mail" name="mail">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
                <a class="btn btn-secondary" href="/controllers/signupCtrl.php">Pas encore de compte ?</a>
            </form>
        </div>
    </div>

</main>