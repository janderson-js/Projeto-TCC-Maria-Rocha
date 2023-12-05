<?php
include("../../dao/FuncionarioDAO.php");

$fDAO = new FuncionarioDAO();
 $f = $fDAO->listarFuncionariosJson();

?>