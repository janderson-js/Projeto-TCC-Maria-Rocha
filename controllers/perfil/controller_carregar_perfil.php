<?php
include("../../dao/PerfilDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $id = isset($_GET['id']) ? $_GET['id'] : null;


    $pDAO = new PerfilDAO();
    $perfis = $pDAO->carregarPorIdPerfilJson($id);
    echo $perfis;
}
