<div class="bg-dark text-light justify-content-center mt-3">
    <div>
        <h1 class="text-center py-3 my-3">Choisis ton quiz:</h1>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center bg-dark text-light">
            <div class="col-6 offset-3 fs-3 align-items-center">
                <ul class="text-white "> 
                    <?php foreach($quizs as $quiz): ?>
                    <li>
                    <a id="linkQuiz" href="/controllers/quizCtrl.php?id=<?=$quiz->getId();?>">
                        <?=$quiz->getName();?>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>