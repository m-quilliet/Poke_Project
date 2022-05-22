
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="row justify-content-center">
        <form class="col-md-8 col-lg-12 text-light my-5 fs-5 py-5 "id="connection" method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
                <?php if (isset($errorsArray['Connection'])) { ?>
                    <div class="alert alert-danger">
                        <?= $errorsArray['Connection'] ?>
                    </div>
                <?php } ?>
                <div class="my-3">
                    <label for="mail" class="form-label">mail :</label>
                    <input type="email" class="form-control" id="mail" name="mail">
                </div>
                <div class="my-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary my-3">Se connecter</button>
                <a class="btn btn-secondary" href="/controllers/userAddCtrl.php">Pas encore de compte ?</a>
            </form>
        </div>
    </div>

