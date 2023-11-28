<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
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

    // Agora você pode fazer o que quiser com os dados
    // Por exemplo, salvar no banco de dados, exibir na página, etc.

    // Exemplo de exibição dos dados
    echo "Data de Início dos Sintomas: $dataInicioSintomas <br>";
    echo "Fatores que Desencadeiam os Sintomas: $fatoresDesencadeiamSintomas <br>";
    echo "Nível de Dor: $nivelDor <br>";
    echo "Localização da Dor: $localizacaoDor <br>";
    echo "Tratamento Anterior: $tratamentoAnterior <br>";
    echo "Motivo do Tratamento Anterior: $motivoTratamentoAnterior <br>";
    echo "Resultado do Tratamento Anterior: $resultadoTratamentoAnterior <br>";
    echo "Problema Físico Recorrente: $problemaFisicoRecorrente <br>";
    echo "Doenças Prévias: $doencasPrevias <br>";
    echo "Cirurgias: $cirurgias <br>";
    echo "Alergias: $alergias <br>";
    echo "Medicamento em Uso: $medicamentoEmUso <br>";
    echo "Histórico Familiar Relevante: $historicoFamiliarRelevante <br>";
}

?>