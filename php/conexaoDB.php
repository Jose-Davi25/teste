<?php
$usuario = 'root';
$senha = '';
$database = 'prime_delivery';
$host = 'localhost';

// CRIA A CONEXÃO USANDO O MYSQL
$mysqli = new mysqli($host, $usuario, $senha, $database);

// VERIFICA SE HOUVE ERRO NA CONEXÃO
if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
?>