<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Inicio do include head -->
    <?php include(__DIR__ . "../../../../includes/head.php"); ?>
    <!-- Fim do include head -->
</head>

<body>
    <div class="wrapper">
        <!-- Inicio include do menu lateral -->
        <?php include(__DIR__ . "../../../../includes/menu_lateral.php"); ?>
        <!-- Fim include do menu lateral -->
        <div class="main">
            <!-- Inicio include da navbar-top -->
            <?php include(__DIR__ . "../../../../includes/navbar_top.php"); ?>
            <!-- Fim include da navbar-top -->
            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Gerenciar Anamnse</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Cadastrar Anamnse</h5>
                                </div>
                                <div class="card-body">
                                    <form action="/projeto-tcc-maria-rocha/controllers/anamnse/controller_cadastrar.php" method="post">
                                        <!-- Data de Início dos Sintomas -->
                                        <div class="mb-3">
                                            <label for="dataInicioSintomas" class="form-label">Data de Início dos Sintomas</label>
                                            <input type="date" class="form-control" id="dataInicioSintomas" name="dataInicioSintomas" required>
                                        </div>

                                        <!-- Fatores que Desencadeiam os Sintomas -->
                                        <div class="mb-3">
                                            <label for="fatoresDesencadeiamSintomas" class="form-label">Fatores que Desencadeiam os Sintomas</label>
                                            <input type="text" class="form-control" id="fatoresDesencadeiamSintomas" name="fatoresDesencadeiamSintomas" required>
                                        </div>

                                        <!-- Nível de Dor -->
                                        <div class="mb-3">
                                            <label for="nivelDor" class="form-label">Nível de Dor</label>
                                            <input type="number" class="form-control" id="nivelDor" name="nivelDor" required>
                                        </div>

                                        <!-- Localização da Dor -->
                                        <div class="mb-3">
                                            <label for="localizacaoDor" class="form-label">Localização da Dor</label>
                                            <input type="text" class="form-control" id="localizacaoDor" name="localizacaoDor" required>
                                        </div>

                                        <!-- Tratamento Anterior -->
                                        <div class="mb-3">
                                            <label for="tratamentoAnterior" class="form-label">Tratamento Anterior</label>
                                            <input type="text" class="form-control" id="tratamentoAnterior" name="tratamentoAnterior" required>
                                        </div>

                                        <!-- Motivo do Tratamento Anterior -->
                                        <div class="mb-3">
                                            <label for="motivoTratamentoAnterior" class="form-label">Motivo do Tratamento Anterior</label>
                                            <input type="text" class="form-control" id="motivoTratamentoAnterior" name="motivoTratamentoAnterior" required>
                                        </div>

                                        <!-- Resultado do Tratamento Anterior -->
                                        <div class="mb-3">
                                            <label for="resultadoTratamentoAnterior" class="form-label">Resultado do Tratamento Anterior</label>
                                            <input type="text" class="form-control" id="resultadoTratamentoAnterior" name="resultadoTratamentoAnterior" required>
                                        </div>

                                        <!-- Problema Físico Recorrente -->
                                        <div class="mb-3">
                                            <label for="problemaFisicoRecorrente" class="form-label">Problema Físico Recorrente</label>
                                            <input type="text" class="form-control" id="problemaFisicoRecorrente" name="problemaFisicoRecorrente" required>
                                        </div>

                                        <!-- Doenças Prévias -->
                                        <div class="mb-3">
                                            <label for="doencasPrevias" class="form-label">Doenças Prévias</label>
                                            <input type="text" class="form-control" id="doencasPrevias" name="doencasPrevias" required>
                                        </div>

                                        <!-- Cirurgias -->
                                        <div class="mb-3">
                                            <label for="cirurgias" class="form-label">Cirurgias</label>
                                            <input type="text" class="form-control" id="cirurgias" name="cirurgias" required>
                                        </div>

                                        <!-- Alergias -->
                                        <div class="mb-3">
                                            <label for="alergias" class="form-label">Alergias</label>
                                            <input type="text" class="form-control" id="alergias" name="alergias" required>
                                        </div>

                                        <!-- Medicamento em Uso -->
                                        <div class="mb-3">
                                            <label for="medicamentoEmUso" class="form-label">Medicamento em Uso</label>
                                            <input type="text" class="form-control" id="medicamentoEmUso" name="medicamentoEmUso" required>
                                        </div>

                                        <!-- Histórico Familiar Relevante -->
                                        <div class="mb-3">
                                            <label for="historicoFamiliarRelevante" class="form-label">Histórico Familiar Relevante</label>
                                            <input type="text" class="form-control" id="historicoFamiliarRelevante" name="historicoFamiliarRelevante" required>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </main>

            <!-- Inicio do include do Footer -->
            <?php include(__DIR__ . "../../../../includes/footer.php"); ?>
            <!-- Fim do include do Footer -->
        </div>
    </div>

    <!-- Inicio do include dos arquivos js -->
    <?php include(__DIR__ . "../../../../includes/js.php"); ?>
    <!-- Fim do include dos arquivos js -->
</body>

</html>