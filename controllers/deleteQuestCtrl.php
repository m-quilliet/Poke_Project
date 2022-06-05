<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../helpers/adminOnly.php');



if (!empty($_GET)) {

    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

    $question = Questions::get($id);

    if ($question && Questions::delete($id)) {

        header('location: /controllers/choiceQuizCtrl.php?id=' . $question->getIdQuiz());
        die;
    }
}
