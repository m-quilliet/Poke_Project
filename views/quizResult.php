<div class="container mt-5">
    <div class="row">
        <h1 class="col-6 offset-3 mt-3 text-white text-center"> Résultats du Quiz : <?= $quiz->getName() ?></h1>
    </div>
    <div class="row">
        <p class="col-6 offset-3 mt-3 text-white text-center fs-1"> <?= $scorePercent ?>% (<?= $scoreNum ?> / <?= $nbQuestions ?>) </p>
    </div>
    <div class="text-center">
        <a type="button" class="btn btn-outline-light fs-3 mt-2" href="/controllers/userQuizListCtrl.php">Retour au choix du Quiz<a>
    </div>
</div>