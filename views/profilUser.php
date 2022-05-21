
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="p-card fire">
				<div class="character-area">
					<img class="character" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/2940219/Charizard.png" />
				</div>
				<div class="details text-center mt-5">
					<span>Profil :</span>
					<h3><?=$user->getLogin()?></h3>
					<p><?=$user->getMail()?></p>
				</div>
                <div class="text-center">
                    <a class="btn my-2 mx-1" href="/controllers/userAddCtrl.php" role="button">Modifier mon profil</a>
                    <a class="btn my-2 mx-1" href="/controllers/validDeleteCtrl.php" role="button">Supprimer mon compte</a>
                    </a>
                </div>
			</div>
		</div>
	</div>
</div>
