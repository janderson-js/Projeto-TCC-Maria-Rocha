<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];

    // Exemplo de exibição dos dados
    echo "titulo: $titulo <br>";
    echo "descricao: $descricao <br>";
    //header('location:/projeto-tcc-maria-rocha/view/administracao/view/pages/pacientes/teste.php');
}
?>
