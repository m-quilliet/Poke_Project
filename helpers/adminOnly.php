<?php
require_once(dirname(__FILE__) . '/../utils/init.php');


if(!isset($user) || ($user->getIdRights() != 1983)){
    header('location: /');
    die;
}