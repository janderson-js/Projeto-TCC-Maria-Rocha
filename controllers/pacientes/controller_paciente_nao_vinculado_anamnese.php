<?php
include("../../dao/PacienteDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $aDAO = new PacienteDAO();
    $aDAO->listarPacienteNãoVinculadoAnamnese();

}
