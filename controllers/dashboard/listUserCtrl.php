<?php
require_once(dirname(__FILE__) . '/../../utils/init.php');
require_once(dirname(__FILE__) . '/../../models/Users.php');
require_once(dirname(__FILE__).'/../config/regex.php');





include(dirname(__FILE__) . '/../../views/dashboard/templates/header.php');
include(dirname(__FILE__) . '/../../views/dashboard/listUser.php');
include(dirname(__FILE__) . '/../../views/dashboard/templates/footer.php');