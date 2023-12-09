<?php

include (__DIR__) . "/../../../../dao/PacienteDAO.php";
include (__DIR__) . "/../../../../dao/ServicoDAO.php";
include (__DIR__) . "/../../../../dao/FuncionarioDAO.php";
$pDAO = new PacienteDAO();
$sDAO = new ServicoDAO();
$fDAO = new FuncionarioDAO();

$p[] = $pDAO->listarPacientes();

$s[] = $sDAO->listarServicos();

$f[] = $fDAO->listarFuncionarios();



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <!-- Inicio do include head -->
    <?php include "../../../includes/head.php"; ?>
    <link rel="stylesheet" href="/marcia_rocha/public/css/calendar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Fim do include head -->

    <script src="/marcia_rocha/public/js/calendar.js"></script>
    <script src="/marcia_rocha/public/js/index.global.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
    <div class="wrapper">
        <!-- Inicio include do menu lateral -->
        <?php include "../../../includes/menu_lateral.php"; ?>
        <!-- Fim include do menu lateral -->
        <div class="main">
            <!-- Inicio include da navbar-top -->
            <?php include "../../../includes/navbar_top.php"; ?>
            <!-- Fim include da navbar-top -->
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="h3 mb-3">Gerenciar Agendamentos</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Agenda</h5>
                                </div>
                                <div class="card-body">

                                    <div id="calendar"></div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <!-- Inicio do include do Footer -->
            <?php include "../../../includes/footer.php"; ?>
            <!-- Fim do include do Footer -->
        </div>
    </div>

    <!-- Inicio Modal para cadastrar evento no calendar -->
    <div class="modal" id="modalAgendamento" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar agendamento.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="agendamentoForm" action="/marcia_rocha/controllers/agendamento/controller_inserirAgendamento.php" method="post">
                        <div id="step1" class="step">
                            <div class="mb-3">
                                <label for="tipoAgendamento">Agendamento:</label>
                                <select id="tipoAgendamento" name="tipoAgendamento">
                                    <option value="" selected>Escolha o Tipo de Agendamento...</option>
                                    <option value="consulta">Consulta</option>
                                    <option value="avaliacao">Avaliação</option>
                                </select>
                            </div>
                            <button type="button" onclick="nextStep()"> Próximo</button>
                        </div>
                        <div id="step2" class="step" style="display: none;">
                            <!-- Perfil -->
                            <div class="mb-3">
                                <label for="paciente" class="form-label">Paciente:</label>
                                <select id="paciente" name="paciente" class="select2">
                                    <option value="" selected>Escolha o Funcionario...</option>
                                    <?php foreach ($p[0] as $paciente) : ?>
                                        <option value="<?php echo $paciente->getId(); ?>">
                                            <?php echo $paciente->getNome(); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <button type="button" onclick="prevStep()">Anterior</button>
                            <button type="button" onclick="nextStep()">Próximo</button>
                        </div>
                        <div id="step3" class="step" style="display: none;">
                            <div class="mb-3">
                                <label for="data">Data Clicada:</label>
                                <input type="date" id="data" name="data" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="funcionario">Funcionario:</label>
                                <select id="funcionario" name="funcionario" class="select2">
                                    <option value="" selected>Escolha o Funcionario...</option>
                                    <?php foreach ($f[0] as $funcionario) : ?>
                                        <option value="<?php echo $funcionario->getId(); ?>">
                                            <?php echo $funcionario->getNome(); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="button" onclick="prevStep()">Anterior</button>
                            <button type="button" onclick="nextStep()">Próximo</button>
                        </div>
                        <div id="step4" class="step" style="display: none;">
                            <div class="mb-3">
                                <label for="tipoAgendamento">Servico:</label>
                                <select id="servico" name="servico" class="select2">
                                    <option value="" selected>Escolha o Funcionario...</option>
                                    <?php foreach ($s[0] as $servico) : ?>
                                        <option value="<?php echo $servico->getId(); ?>">
                                            <?php echo $servico->getNome(); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div id="horarios" class="mb-3">
                                <label for="selecionarHorario">horário:</label>
                                <select class="form-select" id="selecionarHorario" name="selecionarHorario">
                                    <option selected>Selecione um dos hotrarios disponiveis...</option>
                                    <!-- Gerando as opções com intervalo de 30 minutos -->
                                    <?php
                                    $horaInicial = strtotime('07:00');
                                    $horaFinal = strtotime('18:00');

                                    while ($horaInicial <= $horaFinal) {
                                        $horarioFormatado = date('H:i', $horaInicial);
                                        echo "<option value='$horarioFormatado'>$horarioFormatado</option>";
                                        $horaInicial = strtotime('+30 minutes', $horaInicial);
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="button" onclick="prevStep()">Anterior</button>
                            <button type="button" onclick="nextStep()">Próximo</button>
                        </div>
                        <div id="step5" class="step" style="display: none;">
                            <div class="mb-3">
                                <label for="tipo">Tipo de agendamento:</label>
                                <input id="r-tipo" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="r-paciente">Paciente:</label>
                                <input id="r-paciente" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="data">Data:</label>
                                <input id="r-data" type="date" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="funcionario">Funcionario:</label>
                                <input id="r-funcionario" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="servico">servico:</label>
                                <input id="r-servico" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="horario">Horario:</label>
                                <input id="r-horario" type="time" readonly>
                            </div>
                            <button type="button" onclick="prevStep()">Anterior</button>
                            <button id="agendar">Agendar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-md-end">
                    <div class="d-grid gap-2 d-md-flex">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fim Modal para cadastrar evento no calendar -->

    <!-- Inicio Modal para editar evento no calendar -->

    <div class="modal" id="modalEditarAgendamento" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/marcia_rocha/controllers/agendamento/controller_alterar.php" method="post" id="formEditarAgendamento">

                    <input type="text" name="idPaciente" id="idPaciente" hidden>
                    <input type="text" name="idTipo" id="idTipo" hidden>
                    <input type="text" name="cor" id="cor" hidden>

                        <div class="mb-3">
                            <label for="id">ID: </label>
                            <input type="text" class="form-control" name="id" id="id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tipo">Tipo: </label>
                            <input type="text" class="form-control" id="tipo" name="tipo" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="paciente">Paciente: </label>
                            <input type="text" class="form-control" id="paciente" name="paciente" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label for="funcionario">Funcionario:</label>
                            <select id="funcionario" class="form-control" name="funcionario">
                                <option value="" selected>Escolha o Funcionario...</option>
                                <?php foreach ($f[0] as $funcionario) : ?>
                                    <option value="<?php echo $funcionario->getId(); ?>">
                                        <?php echo $funcionario->getNome(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="paciente">Paciente: </label>
                            <input type="date" class="form-control" id="data" name="data" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="paciente">Horario: </label>
                            <input type="time" class="form-control" id="time" name="time" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="status">Status Agendamento: </label>
                            <select name="status" class="form-control" id="status">
                                <option value="Concluido">Concluido</option>
                                <option value="Agendado">Agendado</option>
                                <option value="Cancelado">Cancelar</option>
                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="enviaForm()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Fim Modal para editar evento no calendar -->

    <!-- Inicio do include dos arquivos js -->
    <?php include "../../../includes/js.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- Fim do include dos arquivos js -->
    <script>
        function enviaForm() {
            var form = document.getElementById('formEditarAgendamento');
            form.submit();
        }

        $('.select2').select2({
            placeholder: 'Selecione uma opção...',
            dropdownParent: '#modalAgendamento'
        });

        function nextStep() {
            var currentStep = $(".step:visible");

            // Verificar os campos na etapa atual antes de avançar
            if (validateStep(currentStep.index() + 1)) {
                var nextStep = currentStep.next(".step");

                if (nextStep.length !== 0) {
                    currentStep.hide();
                    nextStep.show();
                }
            }
        }

        function prevStep() {
            var currentStep = $(".step:visible");
            var prevStep = currentStep.prev(".step");

            if (prevStep.length !== 0) {
                currentStep.hide();
                prevStep.show();
            }
        }

        // Função para validar os campos na etapa atual
        function validateStep(step) {
            switch (step) {
                case 1:
                    // Validar campos da etapa 1
                    var tipoAgendamento = $("#tipoAgendamento").val();
                    if (!tipoAgendamento) {
                        alert("Selecione o tipo de agendamento!");
                        return false;
                    }
                    $("#agendamentoForm #r-tipo").val(tipoAgendamento);
                    break;
                case 2:
                    // Validar campos da etapa 2
                    var paciente = $('#paciente').val();
                    var textoSelecionado = $('#paciente').find('option:selected').text();
                    if (!paciente) {
                        alert("Selecione o paciente!");
                        return false;
                    }
                    $("#agendamentoForm #r-paciente").val(textoSelecionado.trim());

                    break;
                case 3:
                    // Validar campos da etapa 2
                    var dataFuncionario = $("#data").val();

                    var funcionario = $('#funcionario').val();
                    var textoSelecionado = $('#funcionario').find('option:selected').text();
                    if (!dataFuncionario) {
                        alert("Selecione a data!");
                        return false;
                    }

                    if (!funcionario) {
                        alert("Selecione o funcionario!");
                        return false;
                    }

                    $("#agendamentoForm #r-data").val(dataFuncionario);
                    $("#agendamentoForm #r-funcionario").val(textoSelecionado.trim());
                    break;
                case 4:
                    // Validar campos da etapa 3
                    var servicoHorario = $("#servico").val();
                    var textoSelecionado = $('#servico').find('option:selected').text();
                    var horario = $('#selecionarHorario').val();
                    if (!servicoHorario) {
                        alert("Selecione o serviço!");
                        return false;
                    }

                    if (!horario) {
                        alert("Selecione o horário!");
                        return false;
                    }
                    $("#agendamentoForm #r-servico").val(textoSelecionado.trim());
                    $("#agendamentoForm #r-horario").val(horario);
                    break;

            }

            return true; // Todos os campos estão preenchidos
        }

        // Função para enviar o formulário (pode ser ajustada conforme necessário)
        function submitForm() {
            // Verificar se todos os campos na etapa 3 estão preenchidos
            if (validateStep(3)) {
                // Obter valores dos campos
                var tipoAgendamento = $("#tipoAgendamento").val();
                var data = $("#data").val();
                var funcionario = $('#funcionario').val();
                var servico = $('#servico').val();
                var horario = $("#horario").val();
            }
        }
    </script>
</body>

</html>