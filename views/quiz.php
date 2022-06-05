<section>
    <main>
        <form method="POST">
            <div class="text-container">
                <h3 >Quiz</h3>
            </div>
            <?php if (isset($question)) : ?>
                <div class="text-container">
                    <p id="nb">QUESTION <?=$_GET['idx_question'] + 1?> / <?= count($questions) ?></p>
                    <p id="quest"><?= $question->getLibelle() ?></p>
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
                <input class="btn-1" type="submit" value="Valider" />
                <!-- <button class="custom-btn btn-12"><span>Click!</span><span>Read More</span></button> -->
            <?php endif ?>
        </form>
        score: <?=$_SESSION['score']?>
    </main>
</section>