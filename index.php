<?php

require_once("config.php");

$user = new Usuario();

echo "---------------- </br>";

$user->loadById(10);
$user->update("alterado!", "alterado!");

echo $user;













?>