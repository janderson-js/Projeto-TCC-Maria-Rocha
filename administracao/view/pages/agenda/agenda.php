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
                                <select class="form-control" id="tipoAgendamento" name="tipoAgendamento">
                                    <option value="" selected>Escolha o Tipo de Agendamento...</option>
                                    <option value="consulta">Consulta</option>
                                    <option value="avaliacao">Avaliação</option>
                                </select>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">

                                    </div>
                                    <div class="col">

                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-info" onclick="nextStep()"> Próximo</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="step2" class="step" style="display: none;">
                            
                            <div class="mb-3">
                                <label for="paciente" class="form-label">Paciente:</label>
                                <select id="paciente" name="paciente" class="form-control select2">
                                    <option value="" selected>Escolha o Paciente...</option>
                                    <?php foreach ($p[0] as $paciente) : ?>
                                        <option value="<?php echo $paciente->getId(); ?>">
                                            <?php echo $paciente->getNome(); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-info" onclick="prevStep()">Anterior</button>
                                </div>
                                <div class="col">

                                </div>
                                <div class="col">

                                    <button type="button" class="btn btn-info" onclick="nextStep()">Próximo</button>
                                </div>
                            </div>

                        </div>
                        <div id="step3" class="step" style="display: none;">
                            <div class="mb-3">
                                <label for="data">Data Clicada:</label>
                                <input type="date" class="form-control" id="data" name="data" readonly>
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
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-info" onclick="prevStep()">Anterior</button>
                                </div>
                                <div class="col">

                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-info" onclick="nextStep(),pegaDados()">Próximo</button>
                                </div>
                            </div>
                        </div>
                        <div id="step4" class="step" style="display: none;">
                            <div class="mb-3">
                                <label for="tipoAgendamento">Servico:</label>
                                <select id="servico" name="servico" class="select2">
                                    <option value="" selected>Escolha o Servico...</option>
                                    <?php foreach ($s[0] as $servico) : ?>
                                        <option value="<?php echo $servico->getId(); ?>">
                                            <?php echo $servico->getNome(); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div id="horarios" class="mb-3">
                                <label for="selecionarHorario">horário:</label>
                                <select class="form-select select2" id="selecionarHorario" name="selecionarHorario">

                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-info" onclick="prevStep()">Anterior</button>
                                </div>
                                <div class="col">

                                </div>
                                <div class="col">

                                    <button type="button" class="btn btn-info" onclick="nextStep()">Próximo</button>
                                </div>

                            </div>

                        </div>
                        <div id="step5" class="step" style="display: none;">
                            <div class="mb-3">
                                <label for="tipo">Tipo de agendamento:</label>
                                <input id="r-tipo" class="form-control" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="r-paciente">Paciente:</label>
                                <input id="r-paciente" class="form-control" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="data">Data:</label>
                                <input id="r-data" class="form-control" type="date" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="funcionario">Funcionario:</label>
                                <input id="r-funcionario" class="form-control" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="servico">servico:</label>
                                <input id="r-servico" class="form-control" type="text" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="horario">Horario:</label>
                                <input id="r-horario" class="form-control" type="time" readonly>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-info" onclick="prevStep()">Anterior</button>
                                </div>
                                <div class="col">

                                </div>
                                <div class="col">

                                    <button class="btn btn-success" id="agendar">Agendar</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-md-end">
                    <div class="d-grid gap-2 d-md-flex">
                        <button type="button" class="btn btn-secondary" onclick="formReset()" data-bs-dismiss="modal">Fechar</button>
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
                    <h5 class="modal-title">Alterar Agendamento</h5>
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
                            <label for="servico">Serviço: </label>
                            <select id="servico" class="form-control" name="servico">
                                <option value="" selected>Escolha o Servico...</option>
                                <?php foreach ($s[0] as $servico) : ?>
                                    <option value="<?php echo $servico->getId(); ?>">
                                        <?php echo $servico->getNome(); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="enviaForm()">Salvar</button>
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
        function formReset() {
            var form = document.getElementById('agendamentoForm');
            form.reset();

        }

        function pegaDados() {
            var data = $('#modalAgendamento #agendamentoForm #data').val();
            var func = $('#modalAgendamento #agendamentoForm #funcionario').val();

            carregarHorarios(data, func);
        }

        function carregarHorarios(dataAgen, id) {
            $.ajax({
                url: "/marcia_rocha/controllers/agendamento/controller_listar_horarios.php",
                type: "GET",
                data: {
                    id: id,
                    dataAgen: dataAgen
                },
                dataType: "json",
                success: function(data) {
                    // Array original de horários
                    var horarios = [
                        "07:00", "07:30", "08:00", "08:30", "09:00", "09:30",
                        "10:00", "10:30", "11:00", "11:30", "12:00",
                        "13:00", "13:30", "14:00", "14:30", "15:00", "15:30",
                        "16:00", "16:30", "17:00", "17:30", "18:00"
                    ];

                    // Filtra os horários
                    horarios = horarios.filter(function(horario) {
                        return data.indexOf(horario) === -1;
                    });


                    preencherSelect(horarios);
                },
                error: function() {
                    failureCallback("Houve um erro ao colocar os dados no formulário de edição de Agendamentos pelo Ajax.");
                },
            });
        }

        function preencherSelect(horarios) {
            var select = document.getElementById("selecionarHorario");

            // Limpa o select antes de adicionar novos horários
            select.innerHTML = "";

            var option = document.createElement("option");
            option.text = 'Selecione um Horario';
            option.value = '0';
            option.selected;
            select.add(option);
            // Adiciona os horários como options ao select
            for (var i = 0; i < horarios.length; i++) {
                var option = document.createElement("option");
                option.text = horarios[i];
                option.value = horarios[i];
                select.add(option);
            }
        }


        function enviaForm() {
            var form = document.getElementById('formEditarAgendamento');
            form.submit();
        }

        $('.select2').select2({
            width: '100%',
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