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

                    <h1 class="h3 mb-3">Cadastrar Paciente</h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Cadastrar Paciente</h5>
                                </div>
                                <div class="card-body">
                                    <form action="/projeto-tcc-maria-rocha/controllers/pacientes/controller_cadastrar.php" method="post" enctype="multipart/form-data">
                                        <!-- Imagem de Perfil -->
                                        <div class="input-file">
                                            <img id="file_upload" src="http://placehold.it/70" alt="your image" class="upload-img" />
                                            <div class="input-file-upload">
                                                <span class="upload-label">Upload Image</span>
                                                <input type="file" name="imagemPerfil" onchange="readURL(this);" />
                                            </div>
                                        </div>
                                        <!-- ID -->
                                        <div class="mb-3">
                                            <label for="id" class="form-label">ID</label>
                                            <input type="text" class="form-control" id="id" name="id" required>
                                        </div>

                                        <!-- Nome -->
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" required>
                                        </div>

                                        <!-- Idade -->
                                        <div class="mb-3">
                                            <label for="idade" class="form-label">Idade</label>
                                            <input type="number" class="form-control" id="idade" name="idade" required>
                                        </div>

                                        <!-- CPF -->
                                        <div class="mb-3">
                                            <label for="cpf" class="form-label">CPF</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" required>
                                        </div>

                                        <!-- Login -->
                                        <div class="mb-3">
                                            <label for="login" class="form-label">Login</label>
                                            <input type="text" class="form-control" id="login" name="login" required>
                                        </div>

                                        <!-- Senha -->
                                        <div class="mb-3">
                                            <label for="senha" class="form-label">Senha</label>
                                            <input type="password" class="form-control" id="senha" name="senha" required>
                                        </div>

                                        <!-- Gênero -->
                                        <div class="mb-3">
                                            <label for="genero" class="form-label">Gênero</label>
                                            <select class="form-select" id="genero" name="genero" required>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                                <option value="outro">Outro</option>
                                            </select>
                                        </div>

                                        <!-- Profissão -->
                                        <div class="mb-3">
                                            <label for="profissao" class="form-label">Profissão</label>
                                            <input type="text" class="form-control" id="profissao" name="profissao" required>
                                        </div>

                                        <!-- Telefone -->
                                        <div class="mb-3">
                                            <label for="telefone" class="form-label">Telefone</label>
                                            <input type="tel" class="form-control" id="telefone" name="telefone" required>
                                        </div>

                                        <!-- Celular -->
                                        <div class="mb-3">
                                            <label for="celular" class="form-label">Celular</label>
                                            <input type="tel" class="form-control" id="celular" name="celular" required>
                                        </div>

                                        <!-- URL da Imagem de Perfil -->
                                        <div class="mb-3">
                                            <label for="urlImgPerfil" class="form-label">URL da Imagem de Perfil</label>
                                            <input type="url" class="form-control" id="urlImgPerfil" name="urlImgPerfil" required>
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