<?php
require_once(dirname(__FILE__) . '/../../models/Users.php');
require_once(dirname(__FILE__).'/../../utils/init.php');




if (!empty($_GET)) {

    $idUsers = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

    if (Users::deleteUsers($idUsers)) {

        $users = new Users();
        $users->deleteUsers($idUsers);

        header ('location: /controllers/dashboard/headerDashCtrl.php');
        die;

    }
}
