<div class="panel panel-success">
    <div class="panel-heading">
        <h1 class="fs-1 mt-2">Liste des Quiz</h1>
    </div>
    <div class="table-responsive mt-3 ">
        <table class="table table-striped " id="example">
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>TESTER</th>
                <th>MODIFIER</th>
                <th>SUP</th>
            </tr>
            <?php foreach ($allquiz as $quiz) : ?>
                <tr class="text-white fs-4">
                    <td ><?= $quiz->getId() ?></td>
                    <td><?= $quiz->getName() ?></td>
                    <td>
                        <a target="_blank" href="/controllers/quizCtrl.php?id=<?= $quiz->getId() ?>">
                            <img src="/public/assets/img/ajouter.png">
                        </a>
                    </td>
                    <td>
                        <a href="/controllers/choiceQuizCtrl.php?id=<?= $quiz->getId() ?>">
                            <img src="/public/assets/img/modifier.png">
                        </a>
                    </td>
                    <td>
                        <a href="/controllers/deleteQuizCtrl.php?id=<?= $quiz->getId() ?>">
                            <img src="/public/assets/img/delete-30.png">
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <a class="btn my-4" href="/controllers/choiceQuizCtrl.php" role="button">Ajouter +</a>
</div>