<form class="col-md-8 col-lg-5 text-light fs-5 py-5 "id="add" method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
    <div class="mb-3 col-8 offset-2">
        <label for="mail" class="form-label">Email </label>
        <input type="email" class="form-control" id="mail" name="mail" placeholder="Mail" value="<?=$user->getMail()?>">
        <?php
        if(isset($errorsArray['mail_error'])):
        ?>
        <p id="errorMail"><?=$errorsArray['mail_error'] ?></p>
        <?php 
        endif 
        ?>
    </div>
    <div class="row">
        <div class="mb-3 col-8 offset-2">
            <label for="password" class="form-label text-white">Mot de passe</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="<?=$_POST['password'] ?? ''?>">
                <?php
                if(isset($errorsArray['password_error'])):
                ?>
                <p id="errorPassword"><?=$errorsArray['password_error'] ?></p>
                <?php 
                endif 
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-8 offset-2">
            <label for="password2" class="form-label">Confirmation de mot de passe</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmer mot de passe" value="<?=$_POST['password2'] ?? ''?>">
            <?php
            if(isset($errorsArray['password_confirm_error'])):
            ?>
            <p id="errorConfirmPassword"><?=$errorsArray['password_confirm_error'] ?></p>
            <?php 
            endif 
            ?>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-8 offset-2">
            <label for="login" class="form-label">Login </label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Login" value="<?=$user->getLogin()?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-5"href="/controllers/homeCtrl.php"><?=!$user->getId() ? "S'inscrire": 'Modification'?></button>


</form>