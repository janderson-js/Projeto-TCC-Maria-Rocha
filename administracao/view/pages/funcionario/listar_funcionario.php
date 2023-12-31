<?php
ob_start();
session_start();

if($_SESSION['usuario'] == null){
    header('location: /marcia_rocha/view/login.php');
}

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

    <title>Listar Funcionário</title>

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
                                    <h5 class="card-title mb-0">Lista Funcionarios</h5>
                                    <button type="button" onclick="addNovocadastro()" class="btn btn-success">Novo Cadastro</button>
                                </div>
                                <div class="card-body">
                                    <div id="msg" hidden> excluido </div>
                                    <table id="listar-funcionario" class="table table-striped table-hover display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>nome</th>
                                                <th>matricula</th>
                                                <th>perfil</th>
                                                <th>Idade</th>
                                                <th>Gênero</th>
                                                <th>Telefone</th>
                                                <th>Celular</th>
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

                            <form id="formEditar" action="/marcia_rocha/controllers/funcionario/controller_alterar.php" method="post">

                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="id" name="id" readonly>
                                </div>
                                <!-- Perfil -->
                                <div class="mb-3">
                                    <label for="perfil" class="form-label">Perfil</label>
                                    <select class="form-select" onchange="coffitoChange();" id="perfil" name="perfil" required>
                                        <option value="" selected>Selecione o perfil </option>
                                        <?php foreach ($p[0] as $perfil) : ?>
                                            <option value="<?php echo $perfil->getId(); ?>">
                                                <?php echo $perfil->getTitulo(); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Nome -->
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>

                                <!-- COFFITO -->
                                <div class="mb-3" hidden id="coffitoDiv">
                                    <label for="coffito" class="form-label">COFFITO</label>
                                    <input type="text" class="form-control" id="coffito" name="coffito">
                                </div>

                                <!-- Matrícula -->
                                <div class="mb-3">
                                    <label for="matricula" class="form-label">Matrícula</label>
                                    <input type="text" class="form-control" id="matricula" name="matricula" required>
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
                            </form>

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

    <script src="https://cdn.datatables.net/responsive/2.2.7/responsive.min.js"></script>




    <script>
        $(document).ready(function() {
            // Inicialização do DataTables
            var tabela = $('#listar-funcionario').DataTable({

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                },
                scrollX: true,
                autoWidth: false,
                ajax: {
                    url: "/marcia_rocha/controllers/funcionario/controller_listar_funcionario.php",
                    dataSrc: ''
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'nome'
                    },
                    {
                        data: 'matricula'
                    },
                    {
                        data: 'perfil.titulo'
                    },
                    {
                        data: 'idade'
                    },
                    {
                        data: 'genero'
                    },
                    {
                        data: 'telefone'
                    },
                    {
                        data: 'celular'
                    },
                    {
                        data: null,
                        title: 'Ação',
                        render: function(data, type, row) {
                            return '<button class="btn btn-warning btn-editar" data-id="' + row.id + '"><i class="fa-solid fa-pen-to-square"></i></button> <button class="btn btn-danger btn-excluir" data-id="' + row.id + '"><i class="fa-solid fa-trash-can"></i></button>';
                        }
                    }
                ],

            });

            // Evento de clique no botão editar
            $('#listar-funcionario tbody').on('click', 'button.btn-editar', function() {
                var data = tabela.row($(this).parents('tr')).data();
                editarDadoDataTable(data.id)
                // Implemente a lógica de edição aqui
            });
            console.log();
            // Evento de clique no botão excluir
            $('#listar-funcionario tbody').on('click', 'button.btn-excluir', function() {
                var data = tabela.row($(this).parents('tr')).data();
                excluirDadoDataTable(data.id, data.nome, tabela)
                // Implemente a lógica de exclusão aqui
            });
        });


        function editarDadoDataTable(id) {
            $("#editarDados").modal("show");

            $.ajax({
                type: 'GET',
                url: '/marcia_rocha/controllers/funcionario/controller_carregar_funcionario.php',
                data: {
                    id: id
                },
                success: function(resposta) {
                    // Lógica a ser executada quando a requisição for bem-sucedida
                    $("#editarDados #formEditar #id").val(resposta.id);
                    $("#editarDados #formEditar #nome").val(resposta.nome);
                    $("#editarDados #formEditar #idade").val(resposta.idade);
                    $("#editarDados #formEditar #coffito").val(resposta.coffito);
                    $("#editarDados #formEditar #genero").val(resposta.genero);
                    $("#editarDados #formEditar #matricula").val(resposta.matricula);
                    $("#editarDados #formEditar #telefone").val(resposta.telefone);
                    $("#editarDados #formEditar #senha").val(resposta.senha);
                    $("#editarDados #formEditar #perfil").val(resposta.perfil.id);
                    $("#editarDados #formEditar #celular").val(resposta.celular);

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

            if (confirm('Deseja Excluir o Funcionario: ' + id + '  ' + nome)) {
                $.ajax({
                    type: 'GET',
                    url: '/marcia_rocha/controllers/funcionario/controller_excluir.php',
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


        function addNovocadastro() {
            window.location.href = "/marcia_rocha/administracao/view/pages/funcionario/form_cadastrar_funcionario.php";
        }


        function coffitoChange() {
            var selectElement = document.getElementById("perfil");

            // Obter o índice do option selecionado
            var selectedIndex = selectElement.selectedIndex;

            // Obter o texto do option selecionado usando o índice
            var nomeDoOption = selectElement.options[selectedIndex].text;

            var coffitoDiv = document.getElementById("coffitoDiv");
            var coffitoCampo = document.getElementById("coffito");
            if (nomeDoOption === "Fisioterapeuta") {
                coffitoDiv.hidden = false;

                coffitoCampo.required = true;
            } else {
                coffitoDiv.hidden = true;
                coffitoCampo.required = false;
            }
        }
    </script>
</body>

</html>