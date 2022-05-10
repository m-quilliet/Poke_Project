<?php

require_once dirname(__FILE__) . '/../utils/init.php';

// Détruit toutes les variables de session
$_SESSION = array();

// Finalement, on détruit la session.
session_destroy();

header('Location: /controllers/homeCtrl.php');
exit;