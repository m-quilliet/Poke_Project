<?php
require_once dirname(__FILE__) . '/../utils/init.php';

$userDashStyle='userDashStyle.css';
$userDashScript='userDash.js';

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/userDash.php');
include(dirname(__FILE__).'/../views/templates/footer.php');