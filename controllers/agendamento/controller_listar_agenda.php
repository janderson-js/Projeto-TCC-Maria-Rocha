<?php
include("../../dao/AgendamentoDAO.php");

$aDAO = new AgendamentoDAO();
$aDAO->listarAgendamentosAgendadoJson();
?>