<?php

require_once dirname(__FILE__) . '/../utils/init.php';


// Finalement, on détruit la session.
session_destroy();

header('location: /controllers/homeCtrl.php');
exit;