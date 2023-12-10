<?php
ob_start();
session_start();

if($_SESSION['usuario'] == null){
    header('location: /marcia_rocha/view/login.php');
}
include_once(dirname(__FILE__) . "/../../../../dao/agendamentoDAO.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Inicio do include head -->
    <?php include_once(dirname(__FILE__) . "/../../../includes/head.php"); ?>
    <!-- Fim do include head -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <title>Lista de Agendamentos</title>

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
                                    <h5 class="card-title mb-0">Lista avaliacões</h5>
                                    <button type="button" onclick="addNovocadastro()" class="btn btn-success">Novo Cadastro</button>
                                </div>
                                <div class="card-body">

                                    <table id="listar-agendamento" class="table table-striped table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>tipo</th>
                                                <th>data</th>
                                                <th>Horario</th>
                                                <th>Status</th>
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
            <style>
                .overflow-hidden {
                    overflow: hidden;
                    white-space: nowrap;
                    /* Evita que o conteúdo quebre para a próxima linha */
                    text-overflow: ellipsis;
                }
            </style>

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
        $(document).ready(function() {
            // Inicialização do DataTables
            var tabela = $('#listar-agendamento').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                },
                scrollX: true,
                autoWidth: false,
                ajax: {
                    url: "/marcia_rocha/controllers/agendamento/controller_lista_agendamento.php",
                    dataSrc: ''
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'tipo'
                    },
                    {
                        data: 'dataAgendamento'
                    },
                    {
                        data: 'horaAgendamento'
                    },
                    {
                        data: 'statusAgendamento',
                    }

                ]
            });


        });


        function addNovocadastro() {
            window.location.href = "/marcia_rocha/administracao/view/pages/agenda/agenda.php";
        }
    </script>
</body>

</html>