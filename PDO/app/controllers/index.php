<?php

use app\models\User;

$user = new User;
var_dump($user->all());

require "../app/views/index.php";
