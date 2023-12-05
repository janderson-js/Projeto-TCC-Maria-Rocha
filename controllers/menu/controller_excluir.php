<?php
include("../../dao/MenuDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $mDAO = new MenuDAO();

    $mDAO->excluirMenu($id);
   
    
    header("location: /Projeto-TCC-Maria-Rocha/administracao/view/pages/perfil/listar_perfil.php");
}