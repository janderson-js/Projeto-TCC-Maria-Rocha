<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="/marcia_rocha/public/js/calendar.js"></script>
    <script src="/marcia_rocha/public/js/index.global.js"></script>
    <!-- Inicio do include head -->
    <?php include "../../../includes/head.php"; ?>
    <link rel="stylesheet" href="/marcia_rocha/public/css/calendar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Fim do include head -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-eO7ztEQaJg9SlsEAv7/s2Fqj2is++FbqOSbmgDyCe9UPOt8gs5Ehj4njhYQyj1gDsxFIeNSuqxbT7jST82ekHw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-NJwYz+t0Bcy+oR0PzqBzLTu1TfZEbD1aFz5l+cgI3lv8wh46+Kx2Bd1D96NTgnNNHwyQrUgJNY7djiH5A/0Wmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                            <div class="mb-3">
                                <label for="tipoAgendamento">Paciente:</label>
                                <select id="paciente" name="paciente">
                                    <option value="" selected>Escolha o Paciente...</option>
                                    <option value="alguem">Alguem 2</option>
                                    <option value="teste">Test e</option>
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
                                <label for="tipoAgendamento">Funcionario:</label>
                                <select id="funcionario" name="funcionario">
                                    <option value="" selected>Escolha o Funcionario...</option>
                                    <option value="alguem">Alguem</option>
                                    <option value="teste">Teste</option>
                                </select>
                            </div>
                            <button type="button" onclick="prevStep()">Anterior</button>
                            <button type="button" onclick="nextStep()">Próximo</button>
                        </div>
                        <div id="step4" class="step" style="display: none;">
                            <div class="mb-3">
                                <label for="tipoAgendamento">Servico:</label>
                                <select id="servico" name="servico">
                                    <option value="" selected>Escolha o servico...</option>
                                    <option value="servico1">servico1</option>
                                    <option value="servico2">servico2</option>
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


    <div class="modal" id="modalAgendamento1" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar agendamento.</h5>
                    <button type="button" onclick="hiddenForms();" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div id="seletor">
                        <label for="">Tipo de Agendamento:</label>
                        <select id="selecionarOpcao" class="form-select" onchange="mostrarOcultarFormulario();" aria-label="Default select example">
                            <option value="0" selected>Selecione o tipo do agendamento...</option>
                            <option value="formAvaliacao">Avaliação</option>
                            <option value="formConsulta">Consulta</option>
                        </select>
                    </div>

                    <form action="" hidden method="post" id="formConsulta">
                        <caption>Consulta</caption>
                        <input type="text" hidden value="Consulta" id="tipo">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Data: </label>
                            <input type="date" class="form-control" id="data" name="data" aria-describedby="emailHelp">
                        </div>
                        <div id="div-funcionario">
                            <div id="funcionario" class="mb-3">
                                <label for="selecionarHorario">Funcionário:</label>
                                <select class="form-select" onchange="esconderHorarios();" id="selectF">
                                    <option value="0" selected>Selecione um dos funcionario disponiveis...</option>
                                    <option value="formAvaliacao">Alguem ai</option>
                                    <option value="formConsulta">alguem ai Novamente</option>
                                </select>
                            </div>
                        </div>
                        <div id="div-horario" hidden>
                            <div id="horarios" class="mb-3">
                                <label for="selecionarHorario">horário:</label>
                                <select class="form-select" id="selecionarHorario">
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
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <form action="" hidden method="post" id="formAvaliacao">
                        <caption>Avaliação</caption>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-md-start">
                    <div class="d-grid gap-2 d-md-flex">
                        <button id="voltar" type="button" onclick="seletorTipo();" class="btn btn-info"><i class="fa-solid fa-arrow-left"></i></i></button>
                        <button class="btn btn-primary me-md-2" type="button">Button</button>
                        <button type="button" onclick="hiddenForms();" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Fim Modal para editar evento no calendar -->

    <!-- Inicio do include dos arquivos js -->
    <?php include "../../../includes/js.php"; ?>
    <!-- Fim do include dos arquivos js -->
    <script>
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
                    if (!paciente) {
                        alert("Selecione o paciente!");
                        return false;
                    }
                    $("#agendamentoForm #r-paciente").val(paciente);
                    break;
                case 3:
                    // Validar campos da etapa 2
                    var dataFuncionario = $("#data").val();
                    var funcionario = $('#funcionario').val();
                    if (!dataFuncionario) {
                        alert("Selecione a data!");
                        return false;
                    }

                    if (!funcionario) {
                        alert("Selecione o funcionario!");
                        return false;
                    }

                    $("#agendamentoForm #r-data").val(dataFuncionario);
                    $("#agendamentoForm #r-funcionario").val(funcionario);
                    break;
                case 4:
                    // Validar campos da etapa 3
                    var servicoHorario = $("#servico").val();
                    var horario = $('#selecionarHorario').val();
                    if (!servicoHorario) {
                        alert("Selecione o serviço!");
                        return false;
                    }

                    if (!horario) {
                        alert("Selecione o horário!");
                        return false;
                    }
                    $("#agendamentoForm #r-servico").val(servicoHorario);
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