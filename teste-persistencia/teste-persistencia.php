<?php

//declaramos os informações de conexão
const HOST = "localhost";
const USER = "root";
const PASSWORD = "bcd127";
const DATABASE = "tasklist";

//conexão com o mysql
$conexao = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

//declaramos o SQL da consulta
// o símblo * significa todos
$sql = " SELECT * FROM tbl_task ";

//fazemos a consulta utilizando a conexão criada
$resultado = mysqli_query($conexao, $sql);

if($resultado == false){
    echo mysqli_error($conexao);
    die();
}

$tarefa = "Minha nova tarefa";

$sqlInsert = "INSERT INTO tbl_task (descricao) VALUES ('$tarefa')";

mysqli_query($conexao, $sqlInsert);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>DESCRIÇÃO</th>
        </tr>
        <?php
            
            while ($linha = mysqli_fetch_array($resultado)) {
        ?>
            <tr>
                <td><?= $linha["id"] ?></td>
                <td><?= $linha["descricao"] ?></td>
            </tr>
        <?php
            }
        ?>
    </table>

</body>

</html>
