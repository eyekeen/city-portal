<?php

session_start();

?>

<!doctype html>
<html lang="ru">

<head>
    <?php

    require_once __DIR__ . '/components/head.php';

    ?>
    <title>Login</title>
</head>

<body>
    <?php

    require_once __DIR__ . '/components/header.php';

    ?>
    <section class="main">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Авторизация
                </div>
                <?php

                if (isset($_SESSION['auth_error'])) {

                ?>
                    <div class="alert alert-danger" role="alert">
                        Login error!
                    </div>

                <?php
                    
                }

                ?>
                <div class="card-body">
                    <form action="/actions/user/login.php" method="post">
                        <div class="mb-3">
                            <label for="emailField" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control <?= isset($_SESSION['auth_error']) ? 'is-invalid' : ''  ?>" id="emailField" aria-describedby="emailHelp">
                            <div class="invalid-feedback">
                                Incorrect email or password.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="passwordField" class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control <?= isset($_SESSION['auth_error']) ? 'is-invalid' : ''  ?>" id="passwordField">
                            <div class="invalid-feedback">
                                Incorrect email or password.
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php 
    
    unset($_SESSION['auth_error']);

    require_once __DIR__ . '/components/scripts.php'; 
    
    ?>
</body>

</html>