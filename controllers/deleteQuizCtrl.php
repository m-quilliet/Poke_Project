<?php
require_once(dirname(__FILE__).'/../utils/init.php');


if (!empty($_GET)) {

    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

    if (Quiz::delete($id)) {

        header ('location: /controllers/listQuizCtrl.php');
        die;

    }
}