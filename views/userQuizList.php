<ul> 
    <?php foreach($quizs as $quiz): ?>
    <li>
       <a href="/controllers/quizCtrl.php?id=<?=$quiz->getId();?>">
           <?=$quiz->getName();?>
        </a>
    </li>
    <?php endforeach ?>
</ul>
