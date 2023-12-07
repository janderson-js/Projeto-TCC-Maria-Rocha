<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $tipo = $_POST["tipoAgendamento"];
    $paciente = $_POST["paciente"];
    $data = $_POST["data"];
    $funcionario = $_POST["funcionario"];
    $servico = $_POST["servico"];
    $horario = $_POST["selecionarHorario"];
    $quemRegistrou = $_SESSION['usuario']['nome'];
    $dataHora = new DateTime();
    $timestamp = $dataHora->getTimestamp();
    // Exemplo de exibição dos dados
    echo "tipo: $tipo <br>";
    echo "paciente: $paciente <br>";
    echo "data: $data <br>";
    echo "funcionario: $funcionario <br>";
    echo "servico: $servico <br>";
    echo "horario: $horario <br>";
    echo "quem registro: $quemRegistrou <br>";
    echo "data registro: $timestamp <br>";


    //header('location:/marcia_rocha/administracao/view/pages/pacientes/teste.php?img=' . $nome_final);
}
