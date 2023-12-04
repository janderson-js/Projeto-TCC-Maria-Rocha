<?php
include("../../dao/PerfilDAO.php");

$pDAO = new PerfilDAO();
 $perfis = $pDAO->listarPerfisJson();
        echo $perfis;
?>