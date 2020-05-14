<?php

require_once("config.php");

$conn = new Sql();

$usuarios = $conn->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios); 













?>