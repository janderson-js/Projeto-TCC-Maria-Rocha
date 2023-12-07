<?php
include("../../dao/AnamneseDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $aDAO = new AnamneseDAO();

    $aDAO->excluirAnamnese($id);
   
    
    header("location: /marcia_rocha/administracao/view/pages/anamnese/listar_anamnese.php");
}