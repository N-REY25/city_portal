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
                    <a class="hm_a" href="/admin?page=my_applications">Мои заявки</a>
                    <a class="hm_a" href="/admin?page=create_applications">Создать заявку</a>
                <?php else : ?>
                    <a class="hm_a" href="/admin?page=categories">Категории</a>
                    <a class="hm_a" href="/admin?page=archive">Архив заявок</a>
                    <a class="hm_a" href="/admin?page=new_applications">Новые заявки</a>
                <?php endif ?>
            </div>
        </header>
        <section class="content_dashboard">
            <?php if ($_SESSION['user']->position == "1") :?>
                <img class="cd_img" src="../img/2iFb.gif" alt="Котик 1">
                <h1>Добро пожаловать в панель управления!</h1>
            <?php else : ?>
                <img class="cd_img" src="../img/6mz.gif" alt="Котик 1">
                <h1>Добро пожаловать в личный кабинет!</h1>
            <?php endif ?>
        </section>
    </body>
</html>