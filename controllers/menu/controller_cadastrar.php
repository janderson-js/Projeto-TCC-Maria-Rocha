<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $urlMenu = $_POST["urlMenu"];

    // Agora você pode fazer o que quiser com os dados e o caminho da imagem de perfil
    // Por exemplo, salvar no banco de dados, exibir na página, etc.

    // Exemplo de exibição dos dados
    echo "titulo: $titulo <br>";
    echo "descricao: $descricao <br>";
    echo "urlMenu: $urlMenu <br>";

    //header('location:/projeto-tcc-maria-rocha/view/administracao/view/pages/pacientes/teste.php');
}
?>
