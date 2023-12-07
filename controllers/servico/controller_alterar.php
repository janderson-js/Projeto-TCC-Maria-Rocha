<?php

include("../../dao/ServicoDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id = $_POST["id"];
    $titulo = $_POST["nome"];
    $descricao = $_POST["descricao"];


    $sDAO = new ServicoDAO();
    $s = new  Servico();

    $s->setId($id);
    $s->setNome($titulo);
    $s->setDescricao($descricao);

    $sDAO->editarServico($s);
   
    
    header("location: /Projeto-TCC-Maria-Rocha/administracao/view/pages/servico/listar_servico.php");
}
