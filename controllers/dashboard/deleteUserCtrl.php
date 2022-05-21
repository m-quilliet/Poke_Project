<?php
require_once(dirname(__FILE__) . '/../../models/Users.php');
require_once(dirname(__FILE__).'/../../utils/init.php');




if (!empty($_GET)) {

    $idUsers = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

    if (Users::deleteUsers($idUsers)) {



        header ('location: /controllers/dashboard/headerDashCtrl.php');
        die;

    }
}
