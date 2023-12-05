<?php
include("../../dao/PerfilDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    $pDAO = new PerfilDAO();

    $pDAO->excluirPerfil($id);
   
    
    header("location: /Projeto-TCC-Maria-Rocha/administracao/view/pages/perfil/listar_perfil.php");
}