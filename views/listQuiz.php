<div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-success">
            <div class="panel-heading">
                <i class="fa fa-table fa-fw"></i> <h1>Liste des Quiz</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="example">
                    <tr>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>ACTIF</th>
                        <th>QUESTIONS</th>
                        <th>MODIFIER</th>
                        <th>SUP</th>
                    </tr>
                    <?php foreach ($allquiz as $quiz) : ?>
                    <tr>
                        <td><?=$quiz->id?></td>
                        <td><?=$quiz->name?></td>
                        <td>
                            <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                            </div>
                        </td>
                        <td><a href="/controllers/.php?id=<?= $quiz->id?>"><img src="/public/assets/img/dossier.png"></a></td>
                        <td><a href="/controllers/choiceQuizCtrl.php?id=<?= $quiz->id?>"><img src="/public/assets/img/editer.png"></a></td>

                        <td><a href="/controllers/deleteQuizCtrl.php?id=<?= $quiz->id?>"><img src="/public/assets/img/delete-30.png"></a></td>
                        
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
                <form class="col-md-9" method="POST" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Titre </label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                        <button type="submit" class="btn btn-primary"href="/controllers/choiceQuizCtrl.php">Ajouter + </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
</div>