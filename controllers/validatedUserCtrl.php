<?php
require_once dirname(__FILE__) . '/../utils/init.php';

require_once dirname(__FILE__) . '/../models/users.php';

$mail = trim(filter_input(INPUT_GET, 'mail', FILTER_SANITIZE_EMAIL));

$userByMail = User::getByMail($mail);

$userByMail->validated_at = date('Y-m-d H:i:s');

$user = new User($userByMail->login, $userByMail->mail, $userByMail->password, $userByMail->validated_at);

$user->update($userByMail->id);