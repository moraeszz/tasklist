<?php

require("./database/conexao.php");
switch($_POST["acao"]){
    case "inserir":
    
        if (isset($_POST["tarefa"])) {
            $tarefa = $_POST["tarefa"];
                $sqlTarefa = "INSERT INTO tbl_task (descricao) VALUES ('$tarefa')";
                $resultado = mysqli_query($conexao, $sqlTarefa);
           
                if($resultado == false){
                    $mensagem = "Erro ao adicionar tarefa!!!";
                    $tipoMensagem = "erro";
                }else{
                    $tipoMensagem = "sucesso";
                    $mensagem = "Tarefa adicionada com sucesso!!!";
                }
               //redirecionar para index.php
            }
       
    break;

    case "deletar":
    // algoritimo de deleção
        if(isset($_POST["tarefaId"]) && $_POST["tarefaId"] !="") {
            $id = $_POST["tarefaId"];
           
            $sqlDelete = "DELETE FROM tbl_task WHERE id = $id";
            $resultado = mysqli_query($conexao, $sqlDelete);
            if($resultado == false){
                $tipoMensagem = "erro";
                $mensagem = "Erro ao excluir a tarefa!!";
            }else{
                $tipoMensagem = "sucesso";
                $mensagem = "Tarefa excluida com sucesso!!";
            }
        }
       

    case "editar":
        if(isset($_POST["tarefa"]) && isset($_POST["tarefaId"])){
            //utilizar a tarefa e a tarefaId
            $tarefa = $_POST["tarefa"];
            $tarefaId = $_POST["tarefaId"];
            //declarar a query update
            $sqlUpdate = "UPDATE tbl_task SET descricao = '$tarefa' WHERE id = $tarefaId";
            //executar a query
            $resultado = mysqli_query($conexao, $sqlUpdate);
           
            
            
            if ($resultado) {
                
                $tipoMensagem = "sucesso";
                $mensagem = "Tarefa editada com sucesso!";
            }else{
                
                $tipoMensagem = "erro";
                $mensagem ="Ops, erro ao editar a tarefa!";
            }
        
        }
        break;
}
header("location: index.php?mensagem=$mensagem&tipoMensagem=$tipoMensagem");
