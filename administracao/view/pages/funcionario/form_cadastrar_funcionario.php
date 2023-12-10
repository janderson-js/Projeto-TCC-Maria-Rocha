<?php
ob_start();
session_start();

if($_SESSION['usuario'] == null){
    header('location: /marcia_rocha/view/login.php');
}
?>
<?php

include (__DIR__) . "/../../../../dao/PerfilDAO.php";
$pDAO = new PerfilDAO();
$p[] = $pDAO->listarPerfis();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Inicio do include head -->
    <?php include(__DIR__ . "../../../../includes/head.php"); ?>
    <!-- Fim do include head -->
    <title>Cadastrar Funcionário</title>
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
                                    <form action="/marcia_rocha/controllers/funcionario/controller_cadastrar.php" method="post" enctype="multipart/form-data">
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

    <script>
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