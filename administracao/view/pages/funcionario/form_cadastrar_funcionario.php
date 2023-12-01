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

                    <h1 class="h3 mb-3">Gerenciar Funcionario</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Cadastrar Funcionario</h5>
                                </div>
                                <div class="card-body">
                                    <form action="/projeto-tcc-maria-rocha/controllers/funcionario/controller_cadastrar.php" method="post" enctype="multipart/form-data">

                                        <!-- Imagem de Perfil -->
                                        <div class="input-file">
                                            <img id="file_upload" src="http://placehold.it/70" alt="your image" class="upload-img" />
                                            <div class="input-file-upload">
                                                <span class="upload-label">Upload Image</span>
                                                <input type="file" name="imagemPerfil" onchange="readURL(this);" />
                                            </div>
                                        </div>

                                        <!-- Nome -->
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" required>
                                        </div>

                                        <!-- COFFITO -->
                                        <div class="mb-3">
                                            <label for="coffito" class="form-label">COFFITO</label>
                                            <input type="text" class="form-control" id="coffito" name="coffito" required>
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
                                            <input type="text" class="form-control" id="genero" name="genero" required>
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
                                        <!-- Perfil -->
                                        <div class="mb-3">
                                            <label for="perfil" class="form-label">Perfil</label>
                                            <select class="form-select" id="perfil" name="perfil" required>
                                                <option value="clinico_geral">Clínico Geral</option>
                                                <option value="cirurgiao">Cirurgião</option>
                                                <option value="pediatra">Pediatra</option>
                                                <!-- Adicione mais opções conforme necessário -->
                                            </select>
                                        </div>

                                        <!-- Especialidade -->
                                        <div class="mb-3">
                                            <label for="especialidade" class="form-label">Especialidade</label>
                                            <select class="form-select" id="especialidade" name="especialidade" required>
                                                <option value="ortopedia">Ortopedia</option>
                                                <option value="cardiologia">Cardiologia</option>
                                                <option value="dermatologia">Dermatologia</option>
                                                <!-- Adicione mais opções conforme necessário -->
                                            </select>
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