<?php 

$config = include 'config.php';

$servidor = $config['servidor'];
$usuario = $config['usuario'];
$senha = $config['senha'];
$db = $config['db'];
$porta = $config['porta'];

$conexao = mysqli_connect($servidor, $usuario, $senha, $db, $porta);

if (!$conexao) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$query = "SELECT * FROM pacientes";
$consulta_pacientes = mysqli_query($conexao, $query);