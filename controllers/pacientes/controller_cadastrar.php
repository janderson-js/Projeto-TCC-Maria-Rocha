<?php

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

    // Processa a imagem de perfil
    $imagemPerfil = $_FILES["imagemPerfil"];
    // Corrija o nome do arquivo removendo espaços extras
    $nomeArquivo = str_replace(' ', '', $imagemPerfil['name']);
    $caminhoTemporario = $imagemPerfil["tmp_name"];
    $caminhoDestino = '/projeto-tcc-maria-rocha/view/administracao/imgPerfil/' . $nomeArquivo; // Pasta onde a imagem será armazenada

    move_uploaded_file($caminhoTemporario, $caminhoDestino);

    // Agora você pode fazer o que quiser com os dados e o caminho da imagem de perfil
    // Por exemplo, salvar no banco de dados, exibir na página, etc.

    // Exemplo de exibição dos dados
    echo "ID: $id <br>";
    echo "Nome: $nome <br>";
    echo "Idade: $idade <br>";
    echo "CPF: $cpf <br>";
    echo "Login: $login <br>";
    echo "Senha: $senha <br>";
    echo "Gênero: $genero <br>";
    echo "Profissão: $profissao <br>";
    echo "Telefone: $telefone <br>";
    echo "Celular: $celular <br>";
    echo "Imagem de Perfil: $caminhoDestino <br>";


    header('location:/projeto-tcc-maria-rocha/view/administracao/view/pages/pacientes/teste.php?img='. $caminhoDestino);
}
?>
