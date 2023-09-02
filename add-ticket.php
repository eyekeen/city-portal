<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
    die();
}

?>

<!doctype html>
<html lang="ru">

<head>
    <?php

    require_once __DIR__ . '/components/head.php';

    ?>

    <title>Add ticket</title>
</head>

<body>
    <?php

    require_once __DIR__ . '/components/header.php';

    ?>
    <section class="main">
        <div class="container">
            <div class="row">
                <h2 class="display-6 mb-3">Добавить заявку</h2>
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
            <div class="row">
                <form method="post" action="/actions/tickets/store.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fullNameField" class="form-label">Тема заявки</label>
                        <input type="text" value="<?= $fileds['title']['value'] ?? ''  ?>" name="title" class="form-control <?= $fileds['title']['error'] ? 'is-invalid' : ''  ?>" id="fullNameField" aria-describedby="emailHelp">
                        <div class="invalid-feedback">
                            <?= $fileds['title']['msg'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fullNameField" class="form-label">Изображение</label>
                        <input type="file" name="image" accept="image/jpeg, image/png" class="form-control <?= $fileds['image']['error'] ? 'is-invalid' : ''  ?>" id="fullNameField" aria-describedby="emailHelp">
                        <div class="invalid-feedback">
                            <?= $fileds['image']['msg'] ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="dobField" class="form-label">Описание</label>
                        <textarea name="description" class="form-control <?= $fileds['description']['error'] ? 'is-invalid' : ''  ?>" id="dobField">
                            <?= $fileds['description']['value'] ?? ''  ?>
                        </textarea>
                        <div class="invalid-feedback">
                            <?= $fileds['description']['msg'] ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить заявку</button>
                </form>
            </div>
        </div>
    </section>
    <?php 
    
    unset($_SESSION['fields']);
    require_once __DIR__ . '/components/scripts.php'; 
    
    ?>
</body>

</html>