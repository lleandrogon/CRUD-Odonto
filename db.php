<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "clinica_db";
$porta = 3307;

$conexao = mysqli_connect($servidor, $usuario, $senha, $db, $porta);

if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}