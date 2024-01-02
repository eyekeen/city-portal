<?php

session_start();

?>

<!doctype html>
<html lang="ru">

<head>
    <?php

    require_once __DIR__ . '/components/head.php';

    ?>
    <title>Register</title>
</head>

<body>
    <?php

    require_once __DIR__ . '/components/header.php';

    ?>
    <section class="main">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Регистрация
                </div>
                <?php

                if (isset($_SESSION['fields'])) {

                ?>
                    <div class="alert alert-danger" role="alert">
                        Incorrect data!
                    </div>

                <?php
                    $fileds = $_SESSION['fields'];
                }

                ?>
                <div class="card-body">
                    <form method="post" action="/actions/user/register.php">
                        <div class="mb-3">
                            <label for="emailRegisterField" class="form-label">E-mail</label>
                            <input type="text" value="<?= $fileds['email']['value'] ?? ''  ?>" name="email" class="form-control <?= $fileds['email']['error'] ? 'is-invalid' : ''  ?>" id="emailRegisterField" aria-describedby="emailHelp" >
                            <div class="invalid-feedback">
                                <?= $fileds['email']['msg'] ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fullNameField" class="form-label">ФИО</label>
                            <input type="text" value="<?= $fileds['name']['value'] ?? ''  ?>" name="name" class="form-control <?= $fileds['name']['error'] ? 'is-invalid' : ''  ?>" id="fullNameField" aria-describedby="emailHelp" >
                            <div class="invalid-feedback">
                                <?= $fileds['name']['msg'] ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="dobField" class="form-label">Дата рождения</label>
                            <input type="date" name="dob" class="form-control" id="dobField" aria-describedby="emailHelp" >
                        </div>
                        <div class="mb-3">
                            <label for="passwordRegisterField" class="form-label">Пароль</label>
                            <input type="password" name="password" class="form-control <?= $fileds['password']['error'] ? 'is-invalid' : ''  ?>" id="passwordRegisterField" >
                            <div class="invalid-feedback">
                                <?= $fileds['password']['msg'] ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="passwordConfirmField" class="form-label">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" class="form-control <?= $fileds['password']['error'] ? 'is-invalid' : ''  ?>" id="passwordConfirmField" >
                        </div>
                        <button type="submit" class="btn btn-primary">Создать аккаунт</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php

    unset($_SESSION['fields']);

    require_once __DIR__ . '/components/scripts.php';

    ?>
</body>

</html>