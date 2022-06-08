<div class="container-fluid">
    <form method="POST" action="<?= htmlspecialchars($_SERVER["REQUEST_URI"]) ?>" class="row">
        <div class="panel-heading">
            <h1>Information du Quiz</h1>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label text-white">TITRE </label>
            <input type="text" class="form-control" name="type" placeholder="saisir le titre" value="<?= $quiz->getName() ?>">
        </div>
        <div>
            <button type="submit" class="btn"><?= !$quiz->getId() ? "Enregistrer" : 'Modifier' ?></button>
            <a class="btn" href="/controllers/listQuizCtrl.php" role="button">Retour</a>
        </div>
    </form>
    <?php if ($quiz->getId() != 0) : ?>
        <div class="row mt-3">
            <div>
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <h1>Liste des Questions</h1>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped text-white fs-5">
                            <tr>
                                <th>ID</th>
                                <th>LIBELLE</th>
                                <th>RESPONSE A</th>
                                <th>RESPONSE B</th>
                                <th>RESPONSE C</th>
                                <th>RESPONSE</th>
                                <th>MODIFIER</th>
                                <th>SUPPRIMER</th>
                            </tr>
                            <?php foreach ($quiz->getQuestions() as $question) : ?>
                                <tr class="text-white">
                                    <td><?= $question->getId() ?></td>
                                    <td><?= $question->getLibelle() ?></td>
                                    <td><?= $question->getResponseA() ?></td>
                                    <td><?= $question->getResponseB() ?></td>
                                    <td><?= $question->getResponseC() ?></td>
                                    <td><?= $question->getResponse() ?></td>
                                    <td>
                                        <a href="/controllers/addQuestCtrl.php?id=<?= $question->getId() ?>">
                                            <img src="/public/assets/img/modifier.png">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/controllers/deleteQuestCtrl.php?id=<?= $question->getId() ?>">
                                            <img src="/public/assets/img/delete-30.png">
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                    <a class="btn my-4 " href="/controllers/addQuestCtrl.php?id_quiz=<?= $quiz->getId() ?>" role="button">Ajouter +</a>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>