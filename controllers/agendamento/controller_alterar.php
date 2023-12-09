<?php 
session_start();
include("../../dao/AgendamentoDAO.php");
include("../../dao/PacienteDAO.php");
include("../../dao/FuncionarioDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id']; 
    $idPAciente = $_POST['idPaciente'];
    $tipo = $_POST['tipo'];
    $tipoAgendamento = $_POST['idTipo'];
    $paciente = $_POST['paciente'];
    $funcionario = $_POST['funcionario'];
    $data = $_POST['data'];
    $status = $_POST['status'];
    $hora = $_POST['time'];
    $cor = $_POST['cor'];
    $dataHora = new DateTime("", new DateTimeZone('America/Sao_Paulo'));
    $dataAlteracao = $dataHora->format('Y-m-d H:i:s');
    $quemAlterou = $_SESSION['usuario']['nome'];

    $agenDAO = new AgendamentoDAO();
    $agen = new Agendamento();

    $pDAO = new PacienteDAO();


    $fDAO = new FuncionarioDAO();

    $c = new Consulta();
    $a = new Avaliacao();

    if($tipo == "Consulta"){
      
        $cDAO = new ConsultaDAO();
        $c->setPaciente($pDAO->carregarPorIdPaciente($paciente));
        $c->setFuncionario($fDAO->carregarPorIdFuncionario($funcionario));
        $c->setHora($hora);
        $c->setData($data);
        $c->setId($tipoAgendamento);

        $cDAO->editarConsulta($c);

       
    }elseif($tipo == "Avalicao"){
        
        $aDAO = new AvaliacaoDAO();
        $a->setPaciente($pDAO->carregarPorIdPaciente($paciente));
        $a->setFuncionario($fDAO->carregarPorIdFuncionario($funcionario));
        $a->setHoraAvaliacao($hora);
        $a->setDataAvaliacao($data);
        $a->setId($tipoAgendamento);

        $aDAO->editarAvaliacao($a);

        
    }
    $agen->setId(intval($id));
    $agen->setDataAlteracao($dataAlteracao);
    $agen->setQuemAlterou($quemAlterou);
    $agen->setDataAgendamento($data);
    $agen->setHoraAgendamento($hora);
    $agen->setTipo($tipo);
    $agen->setStatusAgendamento($status);
    $agen->setCor($cor);
    $agen->setConsulta($c);


    $agenDAO->editarAgendamento($agen);
    $agen->setAvaliacao($a);
}

?>