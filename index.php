<?php

require_once("config.php");

$user = new Usuario();

echo "---------------- </br>";

$user->login("joao@gmail.com", "123");

echo $user;













?>