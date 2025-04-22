<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Login</h1>
    <p><?php $this->showMessages() ?></p>

    <form action="<?php echo constant('URL'); ?>login/authenticate" method="POST">
        <p>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </p>
        <p>
            <input type="submit" value="Iniciar sesión" />
        </p>
        <p>
            ¿No tienes una cuenta? <a href="<?php echo constant('URL'); ?>signup">Registrarse</a>
        </p>


</body>
</html>