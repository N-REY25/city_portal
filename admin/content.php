<?php
    //Проверка на авторизацию
    if (!isset($_SESSION['user'])) {
        header('Location: /admin');
    }
?>
<?php
    //Проверка на авторизацию
    if (!isset($_SESSION['user'])) {
        header('Location: /admin');
    }
?>
<!DOCTYPE html>
    <html class="html_dashboard" lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if ($_SESSION['user']->position == '1') : ?>Панель управления<? else :?><?php echo $_SESSION['user']->surname?> <?php echo $_SESSION['user']->name?><?php endif ?></title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="body_dashboard">
        <section class="preheader">
            <p>Сегодня <?php echo date("d.m.Y") ?></p>
            <div class="p_menu">
                <p class="pm_name"><?php echo $_SESSION['user']->surname ?> <?php echo $_SESSION['user']->name ?></p>
                <a class="pm_a" href="/admin?logout">Выйти</a>
            </div>
        </section>
        <header>
            <img class="h_img" src="../img/logo.svg" alt="Лого">
            <div class="h_menu">
                <?php if ($_SESSION['user']->position == '2') : ?>
                    <a class="hm_a" href="#">Мои заявки</a>
                    <a class="hm_a" href="#">Создать заявку</a>
                <?php else : ?>
                    <a class="hm_a" href="#">Категории</a>
                    <a class="hm_a" href="#">Архив заявок</a>
                    <a class="hm_a" href="#">Новые заявки</a>
                <?php endif ?>
            </div>
        </header>
        <section>
            
        </section>
    </body>
</html>