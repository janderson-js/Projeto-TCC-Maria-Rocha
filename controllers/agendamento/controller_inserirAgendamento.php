<?php
session_start();

include("../../dao/AgendamentoDAO.php");
include("../../dao/ConsultaDAO.php");
include("../../dao/AvaliacaoDAO.php");
include("../../dao/PacienteDAO.php");
include("../../dao/FuncionarioDAO.php");
include("../../dao/ServicoDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
try {
        // Obtém os dados do formulário
        $tipo = $_POST["tipoAgendamento"];
        $paciente = $_POST["paciente"];
        $data = $_POST["data"];
        $funcionario = $_POST["funcionario"];
        $servico = $_POST["servico"];
        $horario = $_POST["selecionarHorario"];
        $quemRegistrou = $_SESSION['usuario']['nome'];
        $dataHora = new DateTime("", new DateTimeZone('America/Sao_Paulo'));
        
    
    
        $dataRegistro = $dataHora->format('Y-m-d H:i:s');
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

        //cria objeto dao e model Funcionario
        $sDAO =  new ServicoDAO();
        $sf = new Servico();
    
        //carrega um paciente
        $p = $pDAO->carregarPorIdPaciente($paciente);
        //carrega um funcionario
        $f = $fDAO->carregarPorIdFuncionario($funcionario);

        $s = $sDAO->carregaPorIdServico($servico);
    
        $ava = new Avaliacao();
        $c = new Consulta();
    
        $idConsulta;
        $idAvaliacao;
        if ($tipo == "avaliacao") {
            //cria objeto dao e model Avaliacao
            $avaDAO =  new AvaliacaoDAO();
            
    
            $ava->setDataAvaliacao($data);
            $ava->setHoraAvaliacao($horario);
            $ava->setPaciente($p);
            $ava->setFuncionario($f);
            $ava->setServico($s);
    
            $idAvaliacao = $avaDAO->inserirAvaliacao($ava);
            
            $agen->setAvaliacao($avaDAO->carregarPorIdAvaliacao($idAvaliacao));
    
        } elseif ($tipo == "consulta") {
            //cria objeto dao e model Consulta
            $cDAO =  new ConsultaDAO();
    
            $c->setData($data);
            $c->setHora($horario);
            $c->setPaciente($p);
            $c->setFuncionario($f);
            $c->setServico($s);
    
            $idConsulta = $cDAO->inserirConsulta($c);
    
            $agen->setConsulta($cDAO->carregarPorIdConsultaAgenda(intval($idConsulta)));
            
        }
    
        $agen->setTipo($tipo);
        $agen->setDataAgendamento($data);
        $agen->setHoraAgendamento($horario);
        $agen->setDataRegistroAgendamento($dataRegistro);
        $agen->setQuemRegistrou($quemRegistrou);
        $agen->setCor('#038554');
    
        $agenDAO->inserirAgendamento($agen);

        header('location:/marcia_rocha/administracao/view/pages/agenda/agenda.php');
} catch (\PDOException $e) {
    echo("Erro no controller listaragendmento: ". $e->getMessage());
}


   
}
