<?php

include("../../dao/PacienteDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $cpf = $_POST["cpf"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $genero = $_POST["genero"];
    $profissao = $_POST["profissao"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $dataNascimento = $_POST['dataNascimento'];

    $pDAO = new PacienteDAO();
    $p = new Paciente();

    $p->setNome($nome);
    $p->setIdade($idade);
    $p->setCpf($cpf);
    $p->setLogin($login);
    $p->setSenha($senha);
    $p->setTelefone($telefone);
    $p->setProfissao($profissao);
    $p->setCelular($celular);
    $p->setGenero($genero);
    $p->setDataNascimento($dataNascimento);


    $pDAO->inserirPaciente($p);



    header('location:/projeto-tcc-maria-rocha/administracao/view/pages/pacientes/listar_pacientes.php');
}
