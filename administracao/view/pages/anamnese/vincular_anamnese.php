<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Inicio do include head -->
    <?php include_once(dirname(__FILE__) . "/../../../includes/head.php"); ?>
    <!-- Fim do include head -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <!-- DataTables Responsive CSS e JS -->
    <link href="https://cdn.datatables.net/responsive/2.2.7/responsive.min.css" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        <!-- Inicio include do menu lateral -->
        <?php include_once(dirname(__FILE__) . "/../../../includes/menu_lateral.php"); ?>
        <!-- Fim include do menu lateral -->
        <div class="main">
            <!-- Inicio include da navbar-top -->
            <?php include_once(dirname(__FILE__) . "/../../../includes/navbar_top.php"); ?>
            <!-- Fim include da navbar-top -->
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5 class="card-title mb-0">Lista anamneses</h5>
                                    <button type="button" onclick="addNovocadastro()" class="btn btn-success">Novo Cadastro</button>
                                </div>
                                <div class="card-body">
                                    <div id="msg" hidden> excluido </div>
                                    <table id="listar-anamnese" class="table table-striped table-hover display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Cpf Paciente</th>
                                                <th>doenças Previas</th>
                                                <th>cirurgia</th>
                                                <th>alergias</th>
                                                <th>medicamentos em uso</th>
                                                <th>historico familiar</th>
                                                <th>tratamento Anterior</th>
                                                <th>motivo do tratamento anterior</th>
                                                <th>resultado do tratamento anterior</th>
                                                <th>problema físico recorrente</th>
                                                <th>data do Inicio do sintoma</th>
                                                <th>fatores que desencadeiam o sintoma</th>
                                                <th>nivel de dor</th>
                                                <th>localização da dor</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <div id="listaPaciente" class="modal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar dados</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" hidden id="idAnamnese" name="idAnamnese">

                            <table id="listar-paciente-vincular" class="table table-striped table-hover display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Cpf Paciente</th>
                                        <th>Nome</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" onclick="enviarFormEditar()" class="btn btn-primary">Salvar mudanças</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Inicio do include do Footer -->
            <?php include_once(dirname(__FILE__) . "/../../../includes/footer.php"); ?>
            <!-- Fim do include do Footer -->
        </div>
    </div>

    <!-- Inicio do include dos arquivos js -->
    <?php include_once(dirname(__FILE__) . "/../../../includes/js.php"); ?>
    <!-- Fim do include dos arquivos js -->
    <!-- Adicione os arquivos JavaScript do Bootstrap e do DataTables -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.9/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/responsive.min.js"></script>





    <script>
        $(document).ready(function() {
            // Inicialização do DataTables
            var tabela = $('#listar-paciente-vincular').DataTable({

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                },
                responsive: true,
                scrollX: true,
                autoWidth: false,
                ajax: {
                    url: "/marcia_rocha/controllers/pacientes/controller_paciente_nao_vinculado_anamnese.php",
                    dataSrc: ''
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'cpf'
                    },
                    {
                        data: 'nome'
                    },
                    {
                        data: null,
                        title: 'Ação',
                        render: function(data, type, row) {
                            return '<button title="Editar" class="btn btn-warning btn-vincular-paciente" data-id="' + row.id + '"><i class="fa-solid fa-pen-to-square"></i></button>';
                        }
                    }
                ],

            });

            // Evento de clique no botão editar
            $('#listar-paciente-vincular tbody').on('click', 'button.btn-vincular-paciente', function() {
                var data = tabela.row($(this).parents('tr')).data();
                var idA = $('#listaPaciente #idAnamnese').val();
                console.log(data);
                vincularAnamnese(idA, data.id, data.nome, tabela);
                // Implemente a lógica de edição aqui
            });
        });

        function vincularAnamnese(idAnamnese, idPaciente,paciente, tabela) {

            if (confirm('Deseja vincular a anamnese ao paciente: ' + paciente)) {
                $.ajax({
                    type: 'GET',
                    url: '/marcia_rocha/controllers/anamnse/controller_vincular_anamnese.php',
                    data: {
                        idAnamnese: idAnamnese,
                        idPaciente: idPaciente
                    },
                    success: function(resposta) {
                        // Lógica a ser executada quando a requisição for bem-sucedida
                        window.location.reload();

                    },
                    error: function(xhr, status, error) {
                        // Lógica a ser executada em caso de erro na requisição
                        console.error('Erro na requisição:', xhr.responseText);
                        console.error('Status:', status);
                        console.error('Erro:', error);
                    }
                });
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // Inicialização do DataTables
            var tabela = $('#listar-anamnese').DataTable({

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                },
                scrollX: true,
                autoWidth: false,
                ajax: {
                    url: "/marcia_rocha/controllers/anamnse/controller_anamnese_nao_vinculada.php",
                    dataSrc: ''
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'cpf'
                    },
                    {
                        data: 'doencasPrevias'
                    },
                    {
                        data: 'cirurgias'
                    },
                    {
                        data: 'alergias'
                    },
                    {
                        data: 'medicamentoEmUso'
                    },
                    {
                        data: 'historicoFamiliarRelevante'
                    },
                    {
                        data: 'tratamentoAnterior'
                    },
                    {
                        data: 'motivoTratamentoAnterior'
                    },
                    {
                        data: 'resultadoTratamentoAnterior'
                    },
                    {
                        data: 'problemaFisicoRecorrente'
                    },
                    {
                        data: 'dataInicioSintomas'
                    },
                    {
                        data: 'fatoresDesencadeiamSintomas'
                    },
                    {
                        data: 'nivelDor'
                    },
                    {
                        data: 'localizacaoDor'
                    },
                    {
                        data: null,
                        title: 'Ação',
                        render: function(data, type, row) {
                            return '<button class="btn btn-warning btn-vincular-anamnese" data-id="' + row.id + '"><i class="fa-solid fa-pen-to-square"></i></button>';
                        }
                    }
                ],

            });

            // Evento de clique no botão editar
            $('#listar-anamnese tbody').on('click', 'button.btn-vincular-anamnese', function() {
                var data = tabela.row($(this).parents('tr')).data();
                modalListaPaciente(data.id)
                // Implemente a lógica de edição aqui
            });
        });


        function modalListaPaciente(idAnamnese) {
            $("#listaPaciente").modal("show");

            $('#listaPaciente #idAnamnese').val(idAnamnese);

        }

        function addNovocadastro() {
            window.location.href = "/marcia_rocha/administracao/view/pages/anamnese/form_cadastrar_anamnese.php";
        }
    </script>
</body>

</html>