<?php

require_once dirname(__FILE__) . '/../utils/init.php';


// Finalement, on détruit la session.
session_destroy();

header('Location: /controllers/homeCtrl.php');
exit;