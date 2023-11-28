<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $coffito = $_POST["coffito"];
    $matricula = $_POST["matricula"];
    $senha = $_POST["senha"];
    $idade = $_POST["idade"];
    $genero = $_POST["genero"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    //$urlImgPerfil = $_POST["urlImgPerfil"];
    $perfil = $_POST["perfil"];
    $especialidade = $_POST["especialidade"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se o formulário foi enviado
        if (isset($_FILES["imagemPerfil"])) {
            // Diretório de destino
            $diretorioDestino = "/projeto-tcc-maria-rocha/view/administracao/imgPerfil/";
    
            // Obtém informações sobre o arquivo
            $nomeArquivo = basename($_FILES["imagemPerfil"]["name"]);
            $caminhoCompleto = $diretorioDestino . $nomeArquivo;
    
            // Move o arquivo para o diretório de destino
            if (move_uploaded_file($_FILES["imagemPerfil"]["tmp_name"], $caminhoCompleto)) {
                echo "A imagem foi enviada com sucesso para $caminhoCompleto.";
            } else {
                echo "Erro ao enviar a imagem.";
            }
        } else {
            echo "Erro: Nenhum arquivo recebido.";
        }
    }
    // Agora você pode fazer o que quiser com os dados
    // Por exemplo, salvar no banco de dados, exibir na página, etc.
    $urlImgPerfil = $caminhoCompleto;
    // Exemplo de exibição dos dados
    echo "Nome: $nome <br>";
    echo "COFFITO: $coffito <br>";
    echo "Matrícula: $matricula <br>";
    echo "Senha: $senha <br>";
    echo "Idade: $idade <br>";
    echo "Gênero: $genero <br>";
    echo "Telefone: $telefone <br>";
    echo "Celular: $celular <br>";
    echo "Perfil: $perfil <br>";
    echo "Especialidade: $especialidade <br>";
    echo "URL da Imagem do Perfil: $caminhoCompleto <br>";
}
