<?php
include("../../dao/AgendamentoDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $aDAO = new AgendamentoDAO();
    $aDAO->carregarPorIdAgendamentoJsonAgenda($id);

    
}
