
    <form  method="POST" action="<?=htmlspecialchars($_SERVER["REQUEST_URI"])?>">
        <div class="col-8 mb-3 mt-5">
            <label for="type" class="form-label">TITRE </label>
            <input type="text" class="form-control" name="type" placeholder="saisir le titre" value="<?=$quiz->getName()?>">
        </div>
        <div class="col-12">
                <button type="submit" class="btn"><?=!$quiz->getId() ? "Enregistrer": 'Modifier'?></button>
                <a class="btn" href="/controllers/listQuizCtrl.php" role="button">Retour</a>
        </div>
    </form>
</div>

