<?php
include("../../dao/ServicoDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $sDAO = new ServicoDAO();

    $sDAO->excluirServico($id);
   
    
    header("location: /Projeto-TCC-Maria-Rocha/administracao/view/pages/servico/listar_servico.php");
}