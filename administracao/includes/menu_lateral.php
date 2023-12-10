<?php

$perfil = $_SESSION['usuario']['perfil'];

?>

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/marcia_rocha/administracao/view/administracao.php">
            <span class="align-middle">Márcia Rocha</span>
        </a>

        <?php
        if ($perfil == "Administrador") { ?>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Páginas
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/administracao.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/index.html">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Meu Site</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Agendamentos
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/agenda/agenda.php">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Agenda</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/agenda/lista_de_consultas.php">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Lista de Consultas</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/agenda/lista_de_avaliacoes.php">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Lista de Avalições</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/agenda/lista_de_agendamentos.php">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Lista de Agendamentos</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Pacientes & Anamneses
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/pacientes/listar_pacientes.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Listar Pacientes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/pacientes/form_cadastrar.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Cadastrar Paciente</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/listar_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Listar Anamneses</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/form_cadastrar_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Cadastrar Anamnse</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/vincular_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Vincular Anamnse</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Funcionários
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/funcionario/listar_funcionario.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Listar Funcionários</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/funcionario/form_cadastrar_funcionario.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Cadastrar Funcionário</span>
                    </a>
                </li>
                <li class="sidebar-header">
                    Gerenciar Serviço
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/servico/listar_servico.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Listar Serviço</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/servico/form_cadastrar_servico.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Cadastrar Serviço</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Menu
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/menu/listar_menu.php">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Listar Menus</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/menu/form_cadastrar_menu.php">
                        <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Cadastrar Menu</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Perfil
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/perfil/listar_perfil.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Listar Perfis</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/perfil/form_cadastrar_perfil.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Cadastrar Perfil</span>
                    </a>
                </li>

                <li class="sidebar-header">

                </li>
            </ul>
        <?php    }
        ?>


        <?php
        if ($perfil == "Gerente") { ?>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Páginas
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/administracao.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/view/index.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Meu Site</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Agendamentos
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/agenda/agenda.php">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Agenda</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Pacientes & Anamneses
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/pacientes/listar_pacientes.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Listar Pacientes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/pacientes/form_cadastrar.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Cadastrar Paciente</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/listar_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Listar Anamneses</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/form_cadastrar_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Cadastrar Anamnse</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/vincular_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Vincular Anamnse</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Funcionários
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/funcionario/listar_funcionario.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Listar Funcionários</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/funcionario/form_cadastrar_funcionario.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Cadastrar Funcionário</span>
                    </a>
                </li>
                <li class="sidebar-header">
                    Gerenciar Serviço
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/servico/listar_servico.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Listar Serviço</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/servico/form_cadastrar_servico.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Cadastrar Serviço</span>
                    </a>
                </li>

                <li class="sidebar-header">

                </li>
            </ul>
        <?php    }
        ?>

        <?php
        if ($perfil == "Atendente") { ?>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Páginas
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/administracao.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/view/index.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Meu Site</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Agendamentos
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/agenda/agenda.php">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Agenda</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Pacientes & Anamneses
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/pacientes/listar_pacientes.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Listar Pacientes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/pacientes/form_cadastrar.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Cadastrar Paciente</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/listar_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Listar Anamneses</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/form_cadastrar_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Cadastrar Anamnse</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/vincular_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Vincular Anamnse</span>
                    </a>
                </li>



                <li class="sidebar-header">

                </li>
            </ul>
        <?php    }
        ?>


        <?php
        if ($perfil == "Fisioterapeuta") { ?>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Páginas
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/administracao.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/view/index.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Meu Site</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Agendamentos
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/agenda/agenda.php">
                        <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Agenda</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Gerenciar Pacientes & Anamneses
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/pacientes/listar_pacientes.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Listar Pacientes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/listar_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Listar Anamneses</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/form_cadastrar_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Cadastrar Anamnse</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/marcia_rocha/administracao/view/pages/anamnese/vincular_anamnese.php">
                        <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Vincular Anamnse</span>
                    </a>
                </li>


                <li class="sidebar-header">

                </li>

            </ul>
        <?php    }
        ?>


    </div>
</nav>