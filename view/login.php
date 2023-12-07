<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/loginStyle.css">
    <link rel="icon" href="public/img/Marciarocha.png" type="image/x-icon">
</head>

<body>
    <form class="login-form" method="post" action="/marcia_rocha/controllers/login/controller_login.php">
        <img src="../public/img/Marciarocha.png" alt="">
        <input type="text" name="login" class="login-username" autofocus="true" required="true" placeholder="Seu login" />
        <input type="password" name="senha" class="login-password" required="true" placeholder="Senha" />
        <input type="submit" name="Login" value="Login" class="login-submit" />
        <<a href="/marcia_rocha/index.html"><input type="button"  value="Voltar" class="login-submit" /></a>
    </form>
    <div class="underlay-photo"></div>
    <div class="underlay-black"></div>
</body>

</html>