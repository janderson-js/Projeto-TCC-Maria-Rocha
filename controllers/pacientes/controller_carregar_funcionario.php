<?php
include("../../dao/FuncionarioDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $id = isset($_GET['id']) ? $_GET['id'] : null;


    $fDAO = new FuncionarioDAO();
    $f = $fDAO->carregarPorIdFuncionarioJson($id);

    echo $f;
}
