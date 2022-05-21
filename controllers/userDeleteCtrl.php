<?php

require_once(dirname(__FILE__).'/../utils/init.php');


if (Users::delete($user->getId())){

        header ('location: /');
        die;
    }
