<?php
require_once(dirname(__FILE__).'/../utils/init.php');
require_once(dirname(__FILE__) . '/../helpers/adminOnly.php');



if (!empty($_GET)) {

    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

    if (Questions::delete($id)) {

        header ('location: /controllers/listQuestCtrl.php');
        die;

    }
}