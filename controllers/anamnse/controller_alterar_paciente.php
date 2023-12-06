<?php

include("../../dao/AnamneseDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $dataInicioSintomas = $_POST["dataInicioSintomas"];
    $fatoresDesencadeiamSintomas = $_POST["fatoresDesencadeiamSintomas"];
    $nivelDor = $_POST["nivelDor"];
    $localizacaoDor = $_POST["localizacaoDor"];
    $tratamentoAnterior = $_POST["tratamentoAnterior"];
    $motivoTratamentoAnterior = $_POST["motivoTratamentoAnterior"];
    $resultadoTratamentoAnterior = $_POST["resultadoTratamentoAnterior"];
    $problemaFisicoRecorrente = $_POST["problemaFisicoRecorrente"];
    $doencasPrevias = $_POST["doencasPrevias"];
    $cirurgias = $_POST["cirurgias"];
    $alergias = $_POST["alergias"];
    $medicamentoEmUso = $_POST["medicamentoEmUso"];
    $historicoFamiliarRelevante = $_POST["historicoFamiliarRelevante"];
    $cpf = $_POST["cpf"];

    $aDAO = new  AnamneseDAO();
    $a = new Anamnese();

    $a->setId($id);
    $a->setDataInicioSintomas($dataInicioSintomas);
    $a->setFatoresDesencadeiamSintomas($fatoresDesencadeiamSintomas);
    $a->setNivelDor($nivelDor);
    $a->setLocalizacaoDor($localizacaoDor);
    $a->setTratamentoAnterior($tratamentoAnterior);
    $a->setMotivoTratamentoAnterior($motivoTratamentoAnterior);
    $a->setResultadoTratamentoAnterior($resultadoTratamentoAnterior);
    $a->setProblemaFisicoRecorrente($problemaFisicoRecorrente);
    $a->setDoencasPrevias($doencasPrevias);
    $a->setCirurgias($cirurgias);
    $a->setAlergias($alergias);
    $a->setMedicamentoEmUso($medicamentoEmUso);
    $a->setHistoricoFamiliarRelevante($historicoFamiliarRelevante);
    $a->setCpf($cpf);


    $aDAO->editarAnamnese($a);
   
    
    header("location: /projeto-tcc-maria-rocha/administracao/view/pages/pacientes/listar_pacientes.php");
}
