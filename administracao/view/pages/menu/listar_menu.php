<?php
include_once(dirname(__FILE__) . "/../../../../dao/MenuDAO.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Inicio do include head -->
    <?php include_once(dirname(__FILE__) . "/../../../includes/head.php"); ?>
    <!-- Fim do include head -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />



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
                                    <h5 class="card-title mb-0">Lista Menus</h5>
                                    <button type="button" onclick="addNovocadastro()" class="btn btn-success">Novo Cadastro</button>
                                </div>
                                <div class="card-body">

                                    <table id="listar-menu" class="table table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>titulo</th>
                                                <th>descrição</th>
                                                <th>URL</th>
                                                <th>ação</th>
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

                            <form id="formEditar" action="/projeto-tcc-maria-rocha/controllers/menu/controller_alterar.php" method="post">
                                <div class="mb-3">
                                    <label for="id" class="form-label">ID:</label>
                                    <input type="text" class="form-control" id="id" name="id" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo">
                                </div>
                                <div class="mb-3">
                                    <label for="descricao" class="form-label">Descrição</label>
                                    <input type="text" class="form-control" id="descricao" name="descricao">
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


    <script>
        $('#listar-menu').DataTable({
            ajax: {
                url: "/Projeto-TCC-Maria-Rocha/controllers/menu/controller_listar_menu.php",
                dataSrc: ''
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'titulo'
                },
                {
                    data: 'descricao'
                },
                {
                    data: 'url'
                },
                {
                    data: 'ação'
                }
            ]


        });

        function editarDadoDataTable(id) {
            $("#editarDados").modal("show");

            $.ajax({
                type: 'GET',
                url: '/Projeto-TCC-Maria-Rocha/controllers/menu/controller_carregar_menu.php',
                data: {
                    id: id
                },
                success: function(resposta) {
                    // Lógica a ser executada quando a requisição for bem-sucedida
                    $("#editarDados #formEditar #id").val(resposta.id);
                    $("#editarDados #formEditar #titulo").val(resposta.titulo);
                    $("#editarDados #formEditar #descricao").val(resposta.descricao);

                },
                error: function(xhr, status, error) {
                    // Lógica a ser executada em caso de erro na requisição
                    console.error('Erro na requisição:', xhr.responseText);
                    console.error('Status:', status);
                    console.error('Erro:', error);
                }
            });
        }

        function excluirDadoDataTable(id) {
            console.log("peguei: " + id);
        }

        function enviarFormEditar(){
            var form = document.getElementById("formEditar");
            form.submit();
        }


        function addNovocadastro(){
            window.location.href = "/projeto-tcc-maria-rocha/administracao/view/pages/menu/form_cadastrar_menu.php";
        }
    </script>
</body>

</html>