<?php
include("../../dao/FuncionarioDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $fDAO = new FuncionarioDAO();

    $fDAO->excluirFuncionario($id);
   
    
    header("location: /Projeto-TCC-Maria-Rocha/administracao/view/pages/funcionario/listar_funcionario.php");
}