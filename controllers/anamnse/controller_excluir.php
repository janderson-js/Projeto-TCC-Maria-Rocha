<?php
include("../../dao/AnamneseDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $aDAO = new AnamneseDAO();

    $aDAO->excluirAnamnese($id);
   
    
    header("location: /Projeto-TCC-Maria-Rocha/administracao/view/pages/anamnese/listar_anamnese.php");
}