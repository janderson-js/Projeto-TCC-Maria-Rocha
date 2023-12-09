<?php 
session_start();
include("../../dao/AgendamentoDAO.php");
include("../../dao/PacienteDAO.php");
include("../../dao/FuncionarioDAO.php");
include("../../dao/ServicoDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id']; 
    $idPAciente = $_POST['idPaciente'];
    $tipo = $_POST['tipo'];
    $tipoAgendamento = $_POST['idTipo'];
    $servico = $_POST['servico'];
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
    $sDAO = new ServicoDAO();

    $fDAO = new FuncionarioDAO();

    $c = new Consulta();
    $a = new Avaliacao();


    if($tipo == "consulta"){
      
        $cDAO = new ConsultaDAO();
        $c->setPaciente($pDAO->carregarPorIdPaciente(intval($idPAciente)));
        $c->setFuncionario($fDAO->carregarPorIdFuncionario(intval($funcionario)));
        $c->setHora($hora);
        $c->setData($data);
        $c->setId($tipoAgendamento);
        $c->setServico($sDAO->carregaPorIdServico(intval($servico)));

        $cDAO->editarConsulta($c);

       
    }elseif($tipo == "avaliacao"){
        
        $aDAO = new AvaliacaoDAO();
        $a->setPaciente($pDAO->carregarPorIdPaciente(intval($idPAciente)));
        $a->setFuncionario($fDAO->carregarPorIdFuncionario(intval($funcionario)));
        $a->setHoraAvaliacao($hora);
        $a->setDataAvaliacao($data);
        $a->setId($tipoAgendamento);
        $a->setServico($sDAO->carregaPorIdServico(intval($servico)));

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
    $agen->setAvaliacao($a);

    $agenDAO->editarAgendamento($agen);

    header('location:/marcia_rocha/administracao/view/pages/agenda/agenda.php');
    
}

?>