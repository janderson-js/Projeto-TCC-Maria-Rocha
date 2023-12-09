<?php
include("../../dao/AgendamentoDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $dataAgen = $_GET['dataAgen'];
    $idFun = $_GET['id'];

    $aDAO = new AgendamentoDAO();
   

    $aDAO->listarHorariosFuncionario($dataAgen, $idFun);
}
