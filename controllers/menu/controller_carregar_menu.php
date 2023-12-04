<?php
include("../../dao/MenuDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    $id = isset($_GET['id']) ? $_GET['id'] : null;


    $mDAO = new MenuDAO();
    $menu = $mDAO->carregaPorIdMenu($id);
    echo $menu;
}
