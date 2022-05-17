
    <form  method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <div class="mb-3">
            <label for="type" class="form-label">TITRE </label>
            <input type="text" class="form-control" id="" name="type" placeholder="saisir le titre">
        </div>
        <div class="col-12">
                <button class="btn btn-primary" type="submit"><?=$quiz->getId() ? 'Enregistrer': 'Modifier'?></button>
        </div>
    </form>
</div>

