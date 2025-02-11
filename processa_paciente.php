<?php 

require "db.php";

$nome = mysqli_escape_string($conexao, $_POST["nome"]);
$cpf =  mysqli_escape_string($conexao, $_POST["cpf"]);
$telefone =  mysqli_escape_string($conexao, $_POST["telefone"]);

$query = "INSERT INTO pacientes(nome, cpf, telefone) VALUES ('$nome', '$cpf', '$telefone')";

mysqli_query($conexao, $query);

header("location:index.php");