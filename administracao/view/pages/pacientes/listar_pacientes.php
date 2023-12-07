<?php

include (__DIR__) . "/../../../../dao/PerfilDAO.php";
$pDAO = new PerfilDAO();
$p[] = $pDAO->listarPerfis();

?>

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
                                    <h5 class="card-title mb-0">Lista Pacientes</h5>
                                    <button type="button" onclick="addNovocadastro()" class="btn btn-success">Novo Cadastro</button>
                                </div>
                                <div class="card-body">
                                    <div id="msg" hidden> excluido </div>
                                    <table id="listar-paciente" class="table table-striped table-hover display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>nome</th>
                                                <th>Idade</th>
                                                <th>cpf</th>
                                                <th>login</th>
                                                <th>senha</th>
                                                <th>genero</th>
                                                <th>profissão</th>
                                                <th>telefone</th>
                                                <th>celular</th>
                                                <th>Data de Nascimento</th>
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

            <div id="editarDados" class="modal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar dados</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form id="formEditar" action="/marcia_rocha/controllers/pacientes/controller_alterar.php" method="post">

                                <div class="mb-3">
                                    <label for="nome" class="form-label">ID: </label>
                                    <input type="text" class="form-control" id="id" name="id" readonly>
                                </div>
                                <!-- Nome -->
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome: </label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <!-- Nome -->
                                <div class="mb-3">
                                    <label for="nome" class="form-label">CPF: </label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                                </div>
                                <!-- Matrícula -->
                                <div class="mb-3">
                                    <label for="matricula" class="form-label">Login: </label>
                                    <input type="text" class="form-control" id="login" name="login" required>
                                </div>

                                <!-- Senha -->
                                <div class="mb-3">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha" required>
                                </div>

                                <!-- Idade -->
                                <div class="mb-3">
                                    <label for="idade" class="form-label">Idade</label>
                                    <input type="text" class="form-control" id="idade" name="idade" required>
                                </div>

                                <!-- Gênero -->
                                <div class="mb-3">
                                    <label for="genero" class="form-label">Gênero</label>
                                    <select class="form-select" name="genero" id="genero">
                                        <option value="" selected>Escolha o gênero:</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="feminino">Feminino</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="profissao" class="form-label">Profissão: </label>
                                    <input type="text" class="form-control" id="profissao" name="profissao" required>
                                </div>

                                <!-- Telefone -->
                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                                </div>

                                <!-- Celular -->
                                <div class="mb-3">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" required>
                                </div>

                                <div class="mb-3">
                                    <label for="dataNascimento" class="form-label">Data de nascimento: </label>
                                    <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" onclick="enviarFormEditar()" class="btn btn-primary">Salvar mudanças</button>
                        </div>
                    </div>
                </div>
            </div>



            <div id="anamnese" class="modal" data-bs-backdrop="static" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Anamnese do Paciente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form id="formAnamnese" action="/marcia_rocha/controllers/anamnse/controller_alterar_paciente.php" method="post">

                                <div class="mb-3">
                                    <label for="dataInicioSintomas" class="form-label">id: </label>
                                    <input type="text" class="form-control" id="id" name="id" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="dataInicioSintomas" class="form-label">CPF: </label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" readonly>
                                </div>


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

                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="button" onclick="enviarFormEditarAnamnese()" class="btn btn-primary">Salvar mudanças</button>
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
            var tabela = $('#listar-paciente').DataTable({

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                },
                scrollX: true,
                autoWidth: false,
                ajax: {
                    url: "/marcia_rocha/controllers/pacientes/controller_listar_paciente.php",
                    dataSrc: ''
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'nome'
                    },
                    {
                        data: 'idade'
                    },
                    {
                        data: 'cpf'
                    },
                    {
                        data: 'login'
                    },
                    {
                        data: 'senha'
                    },
                    {
                        data: 'genero'
                    },
                    {
                        data: 'profissao'
                    },
                    {
                        data: 'telefone'
                    },
                    {
                        data: 'celular'
                    },
                    {
                        data: 'dataNascimento'
                    },
                    {
                        data: null,
                        title: 'Ação',
                        render: function(data, type, row) {
                            return '<button title="Editar" class="btn btn-warning btn-editar" data-id="' + row.id + '"><i class="fa-solid fa-pen-to-square"></i></button> <button title="Excluir" class="btn btn-danger btn-excluir" data-id="' + row.id + '"><i class="fa-solid fa-trash-can"></i></button> <button class="btn btn-info btn-vincular" data-id="' + row.id + '" title="Anamnese"><i class="fa-regular fa-rectangle-list"></i></button>';
                        }
                    }
                ],

            });

            // Evento de clique no botão editar
            $('#listar-paciente tbody').on('click', 'button.btn-editar', function() {
                var data = tabela.row($(this).parents('tr')).data();
                editarDadoDataTable(data.id)
                // Implemente a lógica de edição aqui
            });
            // Evento de clique no botão excluir
            $('#listar-paciente tbody').on('click', 'button.btn-excluir', function() {
                var data = tabela.row($(this).parents('tr')).data();
                excluirDadoDataTable(data.id, data.nome, tabela)
                // Implemente a lógica de exclusão aqui
            });

            // Evento de clique no botão excluir
            $('#listar-paciente tbody').on('click', 'button.btn-vincular', function() {
                var data = tabela.row($(this).parents('tr')).data();
                modelAnamnese(data.id)
                // Implemente a lógica de exclusão aqui
            });
        });


        function editarDadoDataTable(id) {
            $("#editarDados").modal("show");

            $.ajax({
                type: 'GET',
                url: '/marcia_rocha/controllers/pacientes/controller_carregar_paciente.php',
                data: {
                    id: id
                },
                success: function(resposta) {
                    // Lógica a ser executada quando a requisição for bem-sucedida
                    $("#editarDados #formEditar #id").val(resposta.id);
                    $("#editarDados #formEditar #nome").val(resposta.nome);
                    $("#editarDados #formEditar #idade").val(resposta.idade);
                    $("#editarDados #formEditar #cpf").val(resposta.cpf);
                    $("#editarDados #formEditar #login").val(resposta.login);
                    $("#editarDados #formEditar #senha").val(resposta.senha);
                    $("#editarDados #formEditar #genero").val(resposta.genero);
                    $("#editarDados #formEditar #profissao").val(resposta.profissao);
                    $("#editarDados #formEditar #telefone").val(resposta.telefone);
                    $("#editarDados #formEditar #celular").val(resposta.celular);

                    var dataFormatada = moment(resposta.dataNascimento, "DD/MM/YYYY").format("YYYY-MM-DD");
                    console.log(dataFormatada);
                    $("#editarDados #formEditar #dataNascimento").val(dataFormatada);


                },
                error: function(xhr, status, error) {
                    // Lógica a ser executada em caso de erro na requisição
                    console.error('Erro na requisição:', xhr.responseText);
                    console.error('Status:', status);
                    console.error('Erro:', error);
                }
            });
        }

        function modelAnamnese(id) {
            $("#anamnese").modal("show");

            $.ajax({
                type: 'GET',
                url: '/marcia_rocha/controllers/anamnse/controller_anamnese_vinculada.php',
                data: {
                    id: id
                },
                success: function(resposta) {
                    console.log(resposta);
                    // Lógica a ser executada quando a requisição for bem-sucedida
                    $("#anamnese #formAnamnese #id").val(resposta.id);
                    $("#anamnese #formAnamnese #cpf").val(resposta.cpf);
                    $("#anamnese #formAnamnese #doencasPrevias").val(resposta.doencasPrevias);
                    $("#anamnese #formAnamnese #alergias").val(resposta.alergias);
                    $("#anamnese #formAnamnese #cirurgias").val(resposta.cirurgias);
                    var dataFormatada = moment(resposta.dataInicioSintomas, "DD/MM/YYYY").format("YYYY-MM-DD");
                    $("#anamnese #formAnamnese #dataInicioSintomas").val(dataFormatada);
                    $("#anamnese #formAnamnese #fatoresDesencadeiamSintomas").val(resposta.fatoresDesencadeiamSintomas);
                    $("#anamnese #formAnamnese #nivelDor").val(resposta.nivelDor);
                    $("#anamnese #formAnamnese #localizacaoDor").val(resposta.localizacaoDor);
                    $("#anamnese #formAnamnese #tratamentoAnterior").val(resposta.tratamentoAnterior);
                    $("#anamnese #formAnamnese #motivoTratamentoAnterior").val(resposta.motivoTratamentoAnterior);
                    $("#anamnese #formAnamnese #resultadoTratamentoAnterior").val(resposta.resultadoTratamentoAnterior);
                    $("#anamnese #formAnamnese #problemaFisicoRecorrente").val(resposta.problemaFisicoRecorrente);
                    $("#anamnese #formAnamnese #medicamentoEmUso").val(resposta.medicamentoEmUso);
                    $("#anamnese #formAnamnese #historicoFamiliarRelevante").val(resposta.historicoFamiliarRelevante);
                },
                error: function(xhr, status, error) {
                    // Lógica a ser executada em caso de erro na requisição
                    console.error('Erro na requisição:', xhr.responseText);
                    console.error('Status:', status);
                    console.error('Erro:', error);
                }
            });
        }

        function excluirDadoDataTable(id, nome, tabela) {

            if (confirm('Deseja Excluir o Paciente: ' + id + '  ' + nome)) {
                $.ajax({
                    type: 'GET',
                    url: '/marcia_rocha/controllers/pacientes/controller_excluir.php',
                    data: {
                        id: id
                    },
                    success: function(resposta) {
                        // Lógica a ser executada quando a requisição for bem-sucedida
                        tabela.ajax.reload();

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


        function enviarFormEditar() {
            var form = document.getElementById("formEditar");
            form.submit();
        }

        function enviarFormEditarAnamnese() {
            var form = document.getElementById("formAnamnese");
            form.submit();
        }


        function addNovocadastro() {
            window.location.href = "/marcia_rocha/administracao/view/pages/pacientes/form_cadastrar.php";
        }
    </script>
</body>

</html>