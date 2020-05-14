<?php

$conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");



$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES ('lksdkflj@gmail.com.br', '465898')");

$stmt->execute();

$stmt = $conn->prepare("SELECT * FROM tb_usuarios ORDER BY deslogin");

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);















?>