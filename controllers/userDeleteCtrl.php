<?php

require_once(dirname(__FILE__).'/../../utils/init.php');




if (!empty($_GET)) {

    $id = intval(filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT));

    if (Users::delete($id)) {



        header ('location: /controllers/logoutCtrl.php');
        die;

    }
}