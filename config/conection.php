<?php
$db = "agenda";
$user = "dvizera";
$password = "davi0909";
$host = "localhost";

try {
  $conection = new PDO("mysql:host=$host;dbname=$db", $user, $password);
  $conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Adicione esta linha
} catch (PDOException $e) {
  $error = $e->getMessage();
  echo "Erro: $error";
}
