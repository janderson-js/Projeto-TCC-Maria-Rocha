<?php
include("../../dao/ConsultaDAO.php");

$aDAO = new ConsultaDAO();


$aDAO->listarConsultasJson();
