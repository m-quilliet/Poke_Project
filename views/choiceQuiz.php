
    <form  method="POST" action="<?=htmlspecialchars($_SERVER["REQUEST_URI"])?>">
        <div class="mb-3">
            <label for="type" class="form-label">TITRE </label>
            <input type="text" class="form-control" name="type" placeholder="saisir le titre" value="<?=$quiz->getName()?>">
        </div>
        <div class="col-12">
                <button type="submit" class="btn btn-primary"><?=!$quiz->getId() ? "enregistrer": 'Modifier'?></button>
                <a class="btn btn-primary" href="/controllers/listQuizCtrl.php" role="button">Retour</a>
        </div>
    </form>
</div>

