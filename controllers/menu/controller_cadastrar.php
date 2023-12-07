<?php

include("../../dao/MenuDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $url = $_POST['urlMenu'];

    $mDAO = new MenuDAO();
    $m = new Menu();

    $m->setTitulo($titulo);
    $m->setdescricao($descricao);
    $m->setUrl($url);
    $mDAO->inserirMenu($m);
   
    
    header("location: /marcia_rocha/administracao/view/pages/menu/listar_menu.php");
}
