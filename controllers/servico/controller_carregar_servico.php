<?php
include("../../dao/ServicoDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $id = isset($_GET['id']) ? $_GET['id'] : null;


    $sDAO = new ServicoDAO();
    $sDAO->carregaPorIdServicoJson($id);
}
