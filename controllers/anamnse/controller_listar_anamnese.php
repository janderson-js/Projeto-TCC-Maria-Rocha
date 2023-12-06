<?php
include("../../dao/AnamneseDAO.php");

$aDAO = new AnamneseDAO();
 $a = $aDAO->listarAnamnesesJson();
?>