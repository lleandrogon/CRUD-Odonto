<?php

require "db.php";

$id = $_POST["id"];
$nome = mysqli_escape_string($conexao, $_POST["nome"]);
$cpf = mysqli_escape_string($conexao, $_POST["cpf"]);
$telefone = mysqli_escape_string($conexao, $_POST["telefone"]);
$situacao = $_POST["situacao"];

$query = "UPDATE pacientes SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', situacao = $situacao WHERE id = $id";

mysqli_query($conexao, $query);

header("location:index.php");