<section>
    <main>
        <form method="POST">
            <div class="text-container">
                <h3>Quiz</h3>
            </div>
            <?php if (isset($question)) : ?>
                <div class="text-container">
                    <p>QUESTION <?=$_GET['idx_question'] + 1?> / <?= count($questions) ?></p>
                    <p><?= $question->getLibelle() ?></p>
                </div>
                <div class="quiz-options">
                    <input type="radio" class="input-radio one-a" id="responseA" name="response" value="<?= $question->getResponseA() ?>" required>
                    <label class="radio-label" for="responseA">
                        <span class="alphabet">A</span><?= $question->getResponseA() ?>
                    </label>
                    <input type="radio" class="input-radio one-a" id="responseB" name="response" value="<?= $question->getResponseB() ?>" required>
                    <label class="radio-label" for="responseB">
                        <span class="alphabet">B</span><?= $question->getResponseB() ?>

                    </label>
                    <input type="radio" class="input-radio one-a" id="responseC" name="response" value="<?= $question->getResponseC() ?>" required>
                    <label class="radio-label" for="responseC">
                        <span class="alphabet">C</span><?= $question->getResponseC() ?>

                    </label>
                </div>
                <input type="submit" value="Valider" />
            <?php endif ?>
        </form>
        score: <?=$_SESSION['score']?>
    </main>
</section>