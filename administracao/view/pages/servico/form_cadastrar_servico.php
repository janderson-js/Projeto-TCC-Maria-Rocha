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

                    <h1 class="h3 mb-3">Gerenciar Servico</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Cadastrar Servico</h5>
                                </div>
                                <div class="card-body">
                                    <form action="/projeto-tcc-maria-rocha/controllers/servico/controller_cadastrar.php" method="post">

                                        <!-- titulo do menu -->
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Titulo</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                                        </div>

                                        <!-- descrição -->
                                        <div class="mb-3">
                                            <label for="idade" class="form-label">descrição</label>
                                            <input type="text" class="form-control" id="descricao" name="descricao" required>
                                        </div>

                                         <!-- tipo -->
                                         <div class="mb-3">
                                            <label for="idade" class="form-label">Tipo</label>
                                            <input type="text" class="form-control" id="tipo" name="tipo" required>
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