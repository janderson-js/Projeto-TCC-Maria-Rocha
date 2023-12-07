<?php

include("../../dao/PerfilDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];

    $pDAO = new PerfilDAO();
    $p = new Perfil();

    $p->setTitulo($titulo);
    $p->setdescricao($descricao);

    $pDAO->inserirPerfil($p);
   
    
    header("location: /marcia_rocha/administracao/view/pages/perfil/listar_perfil.php");
}
