<?php
session_start();

include("../../dao/LoginDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    $lDAO = new LoginDAO();
    $l = new Login();

    $l->setLogin($login);
    $l->setSenha($senha);

   $_SESSION['usuario'] = $lDAO->Login($l);

   if($_SESSION['usuario'] != null){
        header("location: /Projeto-TCC-Maria-Rocha/administracao/view/administracao.php");
   }
   var_dump($_SESSION['usuario']);
}
