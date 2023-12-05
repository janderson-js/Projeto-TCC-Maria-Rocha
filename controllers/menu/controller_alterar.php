<?php

include("../../dao/MenuDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $url = $_POST['url'];

    $pDAO = new PerfilDAO();
    $p = new Perfil();

    $p->setId($id);
    $p->setTitulo($titulo);
    $p->setdescricao($descricao);

    $pDAO->editarPerfil($p);
   
    
    header("location: /Projeto-TCC-Maria-Rocha/administracao/view/pages/perfil/listar_perfil.php");
}
