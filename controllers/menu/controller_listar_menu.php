<?php
include("../../dao/MenuDAO.php");


$mDAO = new MenuDAO();
$menus = $mDAO->listarMenuJson();
echo $menus;
