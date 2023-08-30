<!doctype html>
<html lang="ru">

<head>
    <?php

    require_once __DIR__ . '/components/head.php';

    ?>
    <title>Home</title>
</head>

<?php

require_once __DIR__ . '/db/db.php';

?>

<body>
    <?php

    require_once __DIR__ . '/components/header.php';

    ?>
    <section class="main">
        <div class="container">
            <div class="row">
                <h2 class="display-6 mb-3">Заявки</h2>
            </div>
            <div class="row">
                <div class="card mb-3">
                    <img src="src/static/image-2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Отремонтировать асфальт <span class="badge bg-warning text-dark">В процессе</span> </h5>
                        <p class="card-text">Возле дороги на улице Ейдемана рядом с Политическим колледжем образовалась опасная яма.</p>
                        <p class="card-text"><small class="text-muted">Добавлено: 24.12.2021</small></p>
                    </div>
                </div>
                <div class="card mb-3">
                    <img src="src/static/image-1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Убрать мусор <span class="badge bg-success">Выполнено</span> </h5>
                        <p class="card-text">В нашем районе стали складировать много мусора, никто не убирает..</p>
                        <p class="card-text"><small class="text-muted">Добавлено: 24.12.2021</small></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once __DIR__ . '/components/scripts.php'; ?>

</body>

</html>