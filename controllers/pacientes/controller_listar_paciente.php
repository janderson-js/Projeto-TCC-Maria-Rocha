<?php
include("../../dao/PacienteDAO.php");

$pDAO = new PacienteDAO();
$pDAO->listarPacientesJson();

?>