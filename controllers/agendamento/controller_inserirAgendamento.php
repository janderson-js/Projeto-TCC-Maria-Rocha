<?php
session_start();

include("../../dao/AgendamentoDAO.php");
include("../../dao/ConsultaDAO.php");
include("../../dao/AvaliacaoDAO.php");
include("../../dao/PacienteDAO.php");
include("../../dao/FuncionarioDAO.php");

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

    //cria objeto dao e model Agendamento
    $agenDAO =  new AgendamentoDAO();
    $agen = new Agendamento();

    //cria objeto dao e model Paciente
    $pDAO =  new PacienteDAO();
    $p = new Paciente();

    //cria objeto dao e model Funcionario
    $fDAO =  new FuncionarioDAO();
    $f = new Funcionario();

    //carrega um paciente
    $p = $pDAO->carregarPorIdPaciente($paciente);
    //carrega um funcionario
    $f = $fDAO->carregarPorIdFuncionario($funcionario);

    $ava = new Avaliacao();
    $c = new Consulta();

    $idConsulta;
    $idAvaliacao;
    if ($tipo == "Avaliacao") {
        //cria objeto dao e model Avaliacao
        $avaDAO =  new AvaliacaoDAO();
        

        $ava->setDataAvaliacao($data);
        $ava->setHoraAvaliacao($horario);
        $ava->setPaciente($p);
        $ava->setFuncionario($f);

        $idAvaliacao = $avaDAO->inserirAvaliacao($ava);

        $agen->setAvaliacao($avaDAO->carregarPorIdAvaliacao($idAvaliacao));

    } elseif ($tipo == "consulta") {
        //cria objeto dao e model Consulta
        $cDAO =  new ConsultaDAO();
        $c = new Consulta();

        $c->setData($data);
        $c->setHora($horario);
        $c->setPaciente($p);
        $c->setFuncionario($f);

        $idConsulta = $cDAO->inserirConsulta($c);
        var_dump($idConsulta);
        $agen->setConsulta($cDAO->carregarPorIdConsulta($idConsulta));
        
    }

    $agen->setTipo($tipo);
    $agen->setDataAgendamento($data);
    $agen->setHoraAgendamento($horario);
    $agen->setDataRegistroAgendamento($timestamp);
    $agen->setQuemRegistrou($quemRegistrou);
    $agen->setCor('#81c9fa');

    $agenDAO->inserirAgendamento($agen);


    //header('location:/marcia_rocha/administracao/view/pages/pacientes/teste.php?img=' . $nome_final);
}
