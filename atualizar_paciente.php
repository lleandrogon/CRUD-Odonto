<?php

require "db.php";

$id = $_POST["id"];
$nome = mysqli_escape_string($conexao, $_POST["nome"]);
$cpf = mysqli_escape_string($conexao, $_POST["cpf"]);
$telefone = mysqli_escape_string($conexao, $_POST["telefone"]);
$situacao = $_POST["situacao"];

$query = "UPDATE pacientes SET nome = '$nome', cpf = '$cpf', telefone = '$telefone', situacao = $situacao WHERE id = $id";

if (mysqli_query($conexao, $query)) {
    $data_alteracao = date('Y-m-d H:i:s');

    $query_historico = "INSERT INTO historico_status (paciente_id, situacao, data_alteracao) 
                        VALUES ($id, $situacao, '$data_alteracao')";

    if (mysqli_query($conexao, $query_historico)) {
        header("location:index.php");
        exit();
    } else {
        echo "Erro ao registrar no histórico: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao atualizar paciente: " . mysqli_error($conexao);
}