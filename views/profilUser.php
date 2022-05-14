<section>
    <p>Votre Profil</p>

        <div class="card">
            <div class="header"></div>
            <div>
                <div>
                    <h2>nom<?=$users->login ?? '' ?></h2>
                    <h3>prenom<?=$users->mail ?? '' ?> </h3>
                </div>
                <div class="text-center">
                    <a href="/controllers/modifUserCtrl.php?id=<?= $users->idAppointment ?>">
                        <button type="button" class="btn btn-outline-warning"><span> Modifier les informations </span></button>
                    </a>
                </div>
            </div>
        </div>
</section>