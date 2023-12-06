<?php
include("../../dao/PacienteDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $id = isset($_GET['id']) ? $_GET['id'] : null;


    $pDAO = new PacienteDAO();
    $pDAO->carregarPorIdPacienteJson($id);
}
