<?php 

require "db.php";

$id_paciente = $_POST["id"];
$novo_status = $_POST["situacao"];

$query = "UPDATE pacientes SET situacao = $novo_status WHERE id = $id_paciente";
mysqli_query($conexao, $query);

$data_alteracao = date('Y-m-d H:i:s');
$query_historico = "INSERT INTO historico_status (paciente_id, situacao, data_alteracao) 
                    VALUES ($id_paciente, $novo_status, '$data_alteracao')";
mysqli_query($conexao, $query_historico);

header("location: index.php");
exit();