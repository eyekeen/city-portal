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
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="emailField" class="form-label">E-mail</label> <input type="email" class="form-control" id="emailField" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
                        </div>
                        <div class="mb-3">
                            <label for="passwordField" class="form-label">Пароль</label> <input type="password" class="form-control" id="passwordField">
                        </div>
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php require_once __DIR__ . '/components/scripts.php'; ?>
</body>

</html>