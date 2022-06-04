<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <i class="fa fa-table fa-fw"></i> <h1>Liste des Quiz</h1>
                </div>
                <div class="table-responsive ">
                    <table class="table table-striped " id="example">
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
                            <td><?=$quiz->getId()?></td>
                            <td><?=$quiz->getName()?></td>
                            <td>
                                <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                </div>
                            </td>
                            <td><a href="/controllers/.php?id=<?= $quiz->getId()?>"><img src="/public/assets/img/ajouter.png"></a></td>
                            <td><a href="/controllers/choiceQuizCtrl.php?id=<?= $quiz->getId()?>"><img src="/public/assets/img/modifier.png"></a></td>
                            <td><a href="/controllers/deleteQuizCtrl.php?id=<?= $quiz->getId()?>"><img src="/public/assets/img/delete-30.png"></a></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                </div>
                    <a class="btn my-4" href="/controllers/choiceQuizCtrl.php" role="button">Ajouter +</a>
                </div>
            </div>
        </div>
    </div>
</div>
