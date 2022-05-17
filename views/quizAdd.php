<form class="col-md-9" method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
    <div class="mb-3">
        <label for="name" class="form-label">Titre </label>
        <input type="text" class="form-control" id="name" name="name" value="">
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">Active</label>
    </div>
    <button type="submit" class="btn btn-primary"href="/controllers/homeCtrl.php">Ajouter</button>
</form>