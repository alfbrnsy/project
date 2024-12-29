<?php

require_once 'User.php';

$username = '2341760016'; // Replace with the actual username
$newPassword = '2341760016'; // Replace with the actual password

$user = new User();
$user->updatePassword($username, $newPassword);



?>