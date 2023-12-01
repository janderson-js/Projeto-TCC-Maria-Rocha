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

    $pasta_destino = __DIR__ . "../../../administracao/imgPerfil/";

    var_dump($pasta_destino);
    if (isset($_FILES['imagemPerfil'])) {
        // Recupera os dados do arquivo enviado
        $nome_arquivo = $_FILES['imagemPerfil']['name'];
        $arquivo_temporario = $_FILES['imagemPerfil']['tmp_name'];
        $tamanho_arquivo = $_FILES['imagemPerfil']['size'];
        $tipo_arquivo = $_FILES['imagemPerfil']['type'];
        $nomeArquivo = str_replace(' ', '',  $nome_arquivo);
        // Verifica se o arquivo é uma imagem (pode adicionar outros tipos de arquivos, se necessário)
        if ($tipo_arquivo == "image/jpeg" || $tipo_arquivo == "image/png" || $tipo_arquivo == "image/gif") {

            // Verifica se a pasta de destino existe, se não existir, cria a pasta
            if (!file_exists($pasta_destino)) {
                mkdir($pasta_destino, 0777);
            }

            // Define o nome do arquivo final (com um número aleatório para evitar sobrescrita)
            $nome_final = uniqid() . "_" . $nomeArquivo;

            // Move o arquivo temporário para a pasta de destino
            if (move_uploaded_file($arquivo_temporario, $pasta_destino . $nome_final)) {
                echo "Arquivo salvo com sucesso!";
            } else {
                echo "Erro ao salvar o arquivo.";
            }
        } else {
            echo "O arquivo deve ser uma imagem (jpg, png ou gif).";
        }
    } else {
        echo "Por favor, envie um arquivo.";
    }

    // Agora você pode fazer o que quiser com os dados e o caminho da imagem de perfil
    // Por exemplo, salvar no banco de dados, exibir na página, etc.

    // Exemplo de exibição dos dados
    echo "Nome: $nome <br>";
    echo "Idade: $idade <br>";
    echo "CPF: $cpf <br>";
    echo "Login: $login <br>";
    echo "Senha: $senha <br>";
    echo "Gênero: $genero <br>";
    echo "Profissão: $profissao <br>";
    echo "Telefone: $telefone <br>";
    echo "Celular: $celular <br>";
    echo "Imagem de Perfil: $pasta_destino $nome_final <br>";


    header('location:/projeto-tcc-maria-rocha/administracao/view/pages/pacientes/teste.php?img=' . $nome_final);
}
