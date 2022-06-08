<main class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="col-12 text-center text-white mt-5"><?= !$user->getId() ? 'Inscription' : 'Modification' ?></h1>
            <form class="col-md-8 col-lg-12 text-light fs-5 py-5 " id="add" method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                <div class="mb-3 px-1 col-8 offset-2">
                    <input type="email" class="form-control" id="mail" name="mail" placeholder="E.mail" value="<?= $user->getMail() ?>">
                    <?php
                    if (isset($errorsArray['mail_error'])) :
                    ?>
                        <p id="errorMail"><?= $errorsArray['mail_error'] ?></p>
                    <?php
                    endif
                    ?>
                </div>
                <div class="row">
                    <div class="mb-3 col-8 offset-2">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="<?= $_POST['password'] ?? '' ?>">
                            <?php
                            if (isset($errorsArray['password_error'])) :
                            ?>
                                <p id="errorPassword"><?= $errorsArray['password_error'] ?></p>
                            <?php
                            endif
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-8 offset-2">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmer mot de passe" value="<?= $_POST['password2'] ?? '' ?>">
                        <?php
                        if (isset($errorsArray['password_confirm_error'])) :
                        ?>
                            <p id="errorConfirmPassword"><?= $errorsArray['password_confirm_error'] ?></p>
                        <?php
                        endif
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-8 offset-2">
                        <input type="text" class="form-control" id="login" name="login" placeholder="Login" value="<?= $user->getLogin() ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5" href="/controllers/homeCtrl.php"><?= !$user->getId() ? "S'inscrire" : 'Modification' ?></button>
                <button type="submit" class="btn btn-primary mt-5" href="/controllers/homeCtrl.php">Retour</button>


            </form>
        </div>
    </div>
</main>