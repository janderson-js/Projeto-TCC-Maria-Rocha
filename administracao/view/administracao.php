<?php
ob_start();
session_start();

if($_SESSION['usuario'] == null){
    header('location: /marcia_rocha/view/login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Inicio do include head -->
    <?php include "../includes/head.php"; ?>
    <title>Dashboard</title>
    <!-- Fim do include head -->
</head>

<body>
    <div class="wrapper">
        <!-- Inicio include do menu lateral -->
        <?php include "../includes/menu_lateral.php"; ?>
        <!-- Fim include do menu lateral -->
        <div class="main">
            <!-- Inicio include da navbar-top -->
            <?php include "../includes/navbar_top.php"; ?>
            <!-- Fim include da navbar-top -->
            <main class="content">
                <div class="container-fluid p-0">


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Administração</h5>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">Agenda</div>
                                                    <div class="card-body text-secondary">
                                                        <h5 class="card-title">Secondary card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="/marcia_rocha/administracao/view/pages/agenda/agenda.php" class="btn btn-primary">Ir para...</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">Cadastrar um Funcionario</div>
                                                    <div class="card-body text-secondary">
                                                        <h5 class="card-title">Secondary card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="/marcia_rocha/administracao/view/pages/pacientes/form_cadastrar.php" class="btn btn-primary">Ir para...</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">Cadastrar um Paciente</div>
                                                    <div class="card-body text-secondary">
                                                        <h5 class="card-title">Secondary card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="/marcia_rocha/administracao/view/pages/anamnese/form_cadastrar_anamnese.php" class="btn btn-primary">Ir para...</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">Cadastrar Anamnese</div>
                                                    <div class="card-body text-secondary">
                                                        <h5 class="card-title">Secondary card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="/marcia_rocha/administracao/view/pages/funcionario/form_cadastrar_funcionario.php" class="btn btn-primary">Ir para...</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">Cadastrar Serviço</div>
                                                    <div class="card-body text-secondary">
                                                        <h5 class="card-title">Secondary card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="/marcia_rocha/administracao/view/pages/servico/form_cadastrar_servico.php" class="btn btn-primary">Ir para...</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">Cadastrar Menu</div>
                                                    <div class="card-body text-secondary">
                                                        <h5 class="card-title">Secondary card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="/marcia_rocha/administracao/view/pages/menu/form_cadastrar_menu.php" class="btn btn-primary">Ir para...</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                                    <div class="card-header">Cadastrar Perfil</div>
                                                    <div class="card-body text-secondary">
                                                        <h5 class="card-title">Secondary card title</h5>
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a href="/marcia_rocha/administracao/view/pages/perfil/form_cadastrar_perfil.php" class="btn btn-primary">Ir para...</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

            <!-- Inicio do include do Footer -->
            <?php include "../includes/footer.php"; ?>
            <!-- Fim do include do Footer -->
        </div>
    </div>

    <!-- Inicio do include dos arquivos js -->
    <?php include "../includes/js.php"; ?>
    <!-- Fim do include dos arquivos js -->
</body>

</html>