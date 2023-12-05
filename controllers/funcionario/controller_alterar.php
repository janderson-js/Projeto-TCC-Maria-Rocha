<?php

include("../../dao/FuncionarioDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $coffito = $_POST["coffito"];
    $matricula = $_POST["matricula"];
    $senha = $_POST["senha"];
    $idade = $_POST["idade"];
    $genero = $_POST["genero"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $perfil = $_POST["perfil"];

    $fDAO = new FuncionarioDAO();
    $f = new Funcionario();

    $pDAO = new PerfilDAO();
    $p = new Perfil();

    $f->setId($id);
    $f->setNome($nome);
    $f->setCoffito(isset($coffito) ? $coffito : "");
    $f->setMatricula($matricula);
    $f->setSenha($senha);
    $f->setIdade($idade);
    $f->setGenero($genero);
    $f->setTelefone($telefone);
    $f->setCelular($celular);

    $f->setPerfil($pDAO->carregarPorIdPerfil($perfil));

    $fDAO->editarFuncionario($f);
   
    
    header("location: /Projeto-TCC-Maria-Rocha/administracao/view/pages/funcionario/listar_funcionario.php");
}
