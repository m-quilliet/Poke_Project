<section>
    <p>Votre Profil</p>

        <div class="card">
            <div class="header"></div>
            <div>
                <div>
                    <h2>Login: <?=$user->getLogin()?></h2>
                    <h3>E.mail : <?=$user->getMail()?> </h3>
                </div>
                <div class="text-center">
                    <a href="/controllers/userAddCtrl.php">
                    <button type="button" class="btn btn-outline-warning"><span> Modifier vos informations </span></button>
                    </a>
                </div>
            </div>
        </div>
</section>
