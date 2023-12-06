<?php

include("../../dao/MenuDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $url = $_POST['url'];

    $mDAO = new MenuDAO();
    $m = new menu();

    $m->setId($id);
    $m->setTitulo($titulo);
    $m->setdescricao($descricao);
    $m->setUrl($url);

    $mDAO->editarMenu($m);
   
    
    header("location: /projeto-tcc-maria-rocha/administracao/view/pages/menu/listar_menu.php");
}
