<?php
require_once(dirname(__FILE__).'/../utils/init.php');


if (!empty($_GET)) {

    $id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

    if (Quiz::delete($id)) {

        header ('location: /controllers/listQuizCtrl.php');
        die;

    }
}