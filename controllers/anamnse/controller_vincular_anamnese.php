<?php
include("../../dao/AnamneseDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $idAnamnese = isset($_GET['idAnamnese']) ? $_GET['idAnamnese'] : null;
    $idPaciente = isset($_GET['idPaciente']) ? $_GET['idPaciente'] : null;

    if($idAnamnese !== null && $idPaciente !== null) {
        $aDAO = new AnamneseDAO();
        $aDAO->vincularAnamnese($idAnamnese, $idPaciente);
        header("location: /marcia_rocha/administracao/view/pages/anamnese/vincular_anamnese.php");
    }
    
}