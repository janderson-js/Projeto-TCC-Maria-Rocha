<?php

include("../../dao/ServicoDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST["nome"];
    $descricao = $_POST["descricao"];

    $sDAO = new ServicoDAO();
    $s = new  Servico();

    $s->setNome($titulo);
    $s->setDescricao($descricao);


    $sDAO->inserirServico($s);
    
    header('location:/Projeto-TCC-Maria-Rocha/administracao/view/pages/servico/listar_servico.php');
}
?>
