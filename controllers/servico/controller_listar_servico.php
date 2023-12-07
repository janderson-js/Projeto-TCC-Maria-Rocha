<?php
include("../../dao/ServicoDAO.php");

$sDAO = new ServicoDAO();
$sDAO->listarServicosJson();
?>