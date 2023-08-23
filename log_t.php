<?php

include("conexao.php");

$nome = $_POST["nome"];
$idade = $_POST["idade"];
$sexo = $_POST["sexo"];

$empregados = [];

$resposta =
    [
        "nome" => $nome,
        "idade" => $idade,
        "sexo" => $sexo
    ];

array_push($empregados, $resposta);

$stmt = $conn->prepare("INSERT INTO empregado (nome_empregado, idade_empregado, sexo_empregado) VALUES (?,?,?)");
$stmt->bind_param('sss', $nome, $idade, $sexo);
$stmt->execute();

$json_texto = json_encode(["empregados" => $empregados]);
echo ($json_texto);

?>