<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/loginStyle.css">
</head>

<body>
    <form class="login-form" method="post" action="/Projeto-TCC-Maria-Rocha/controllers/login/controller_login.php">
        <img src="../public/img/Marciarocha.png" alt="">
        <input type="text" name="login" class="login-username" autofocus="true" required="true" placeholder="Seu login" />
        <input type="password" name="senha" class="login-password" required="true" placeholder="Senha" />
        <input type="submit" name="Login" value="Login" class="login-submit" />
    </form>
    <div class="underlay-photo"></div>
    <div class="underlay-black"></div>
</body>

</html>