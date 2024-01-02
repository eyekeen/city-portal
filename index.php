<?php

session_start();


?>

<!doctype html>
<html lang="ru">

<head>
    <?php

    require_once __DIR__ . '/components/head.php';

    ?>
    <title>Главная</title>
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
                <h2 class="display-6 mb-3">Заявки <?= isset($_SESSION['user']) ?? $_SESSION['user']['name']  ?></h2>
            </div>
            <div class="row">
                <?php

                if (isset($_GET['q'])) {
                    $q = $db->prepare("SELECT ts.*, tgs.label, tgs.background , tgs.color FROM tickets ts JOIN ticket_tags tgs ON tgs.id = ts.tag_id WHERE ts.title LIKE :q ORDER BY ts.id DESC");
                    $q->execute(['q' => "%{$_GET['q']}%"]);

                    $tickets = $q->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $tickets = $db->query("SELECT ts.*, tgs.label, tgs.background , tgs.color FROM tickets ts JOIN ticket_tags tgs ON tgs.id = ts.tag_id ORDER BY ts.id DESC")->fetchAll(PDO::FETCH_ASSOC);
                }

                if (empty($tickets)) {
                ?>
                    <div class="alert alert-warning" role="alert">
                        Заявки не найдены
                    </div>
                <?php

                }

                foreach ($tickets as $ticket) {
                ?>
                    <div class="card mb-3">
                        <img src="<?= $ticket['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ticket['title'] ?><span class="badge" style="margin-left: 5px; background: <?= $ticket['background'] ?>; color: <?= $ticket['color'] ?>"><?= $ticket['label'] ?></span> </h5>
                            <p class="card-text"><?= $ticket['title'] ?></p>
                            <p class="card-text"><small class="text-muted">Добавлено: <?= $ticket['created_at']  ?></small></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php require_once __DIR__ . '/components/scripts.php'; ?>

</body>

</html>