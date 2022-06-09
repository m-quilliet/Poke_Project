<form class="col-md-9 mt-5 text-white" method="POST" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">

    <select class="form-select" aria-label="Default select example" name="id_quiz">
        <?php
        foreach ($allQuiz as $quiz) :
        ?>
            <option <?= $quiz->getId() == $question->getIdQuiz() ? 'selected' : '' ?> value="<?= $quiz->getId() ?>" disabled><?= $quiz->getName() ?></option>
        <?php endforeach ?>
    </select>
    <div class="mb-3 mt-3">
        <label for="libelle" class="form-label">Libelle </label>
        <input type="text" class="form-control" id="libelle" name="libelle" value="<?= $question->getLibelle() ?>">
        <?php
        if (isset($errorsArray['libelle_error'])) :
        ?>
            <p id="errorlibelle"><?= $errorsArray['libelle_error'] ?></p>
        <?php
        endif
        ?>
    </div>
    <div class="mb-3">
        <label for="responseA" class="form-label">responseA</label>
        <input type="text" class="form-control" id="responseA" name="responseA" value="<?= $question->getResponseA() ?>">
        <?php
        if (isset($errorsArray['responseA_error'])) :
        ?>
            <p id="errorresponseA"><?= $errorsArray['responseA_error'] ?></p>
        <?php
        endif
        ?>
    </div>
    <div class="mb-3">
        <label for="reponseB" class="form-label">reponseB</label>
        <input type="text" class="form-control" id="responseB" name="responseB" value="<?= $question->getResponseB() ?>">
        <?php
        if (isset($errorsArray['responseB_error'])) :
        ?>
            <p id="errorresponseB"><?= $errorsArray['responseB_error'] ?></p>
        <?php
        endif
        ?>
    </div>
    <div class="mb-3">
        <label for="reponseC" class="form-label">reponseC </label>
        <input type="text" class="form-control" id="responseC" name="responseC" value="<?= $question->getResponseC() ?>">
        <?php
        if (isset($errorsArray['responseC_error'])) :
        ?>
            <p id="errorresponseC"><?= $errorsArray['responseC_error'] ?></p>
        <?php
        endif
        ?>
    </div>
    <div class="mb-3">
        <label for="reponse" class="form-label">reponse </label>
        <input type="text" class="form-control" id="response" name="response" value="<?= $question->getResponse() ?>">
        <?php
        if (isset($errorsArray['response_error'])) :
        ?>
            <p id="errorresponse"><?= $errorsArray['response_error'] ?></p>
        <?php
        endif
        ?>
    </div>
    <button type="submit" class="btn" href="/controllers/addQuestCtrl.php"><?= !$question->getId() ? "Créer" : 'Modifier' ?></button>
    <a href="/controllers/listQuizCtrl.php" class="btn" type="button">Retour</a>
</form>