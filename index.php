<?php
    
    $applications = R::('applications' 'WHERE status = 1');
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LifeПенза</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    </head>
    <body>
        <section class="preheader">
            <p>Сегодня <?php echo date("d.m.Y") ?></p>
            <div class="p_menu">
                <a class="pm_a" href="#">Войти</a>
                <a class="pm_a" href="#">Зарегистрироваться</a>
            </div>
        </section>
        <header>
            <img class="h_img" src="img/logo.svg" alt="Лого">
        </header>

        <!-- Подгрузка изображений -->
        <img src="img/img_2.jpg" style="display: none;">
        <img src="img/img_3.jpg" style="display: none;">
        <img src="img/img_4.jpg" style="display: none;">
        <img src="img/img_5.jpg" style="display: none;">

        <section class="welcome">
            <div class="wrapper">
                <h1 class="w_h1">Городской портал Пензы</h1>
                <p class="w_p">Создайте заявку на устранение проблем в городе!</p>
            </div>
        </section>
        <section class="counter">
            <div class="wrapper">
                <h2>Решенных заявок: 5</h2>
                <div class="hr"></div>
            </div>
        </section>
        <section class="content">
            <div class="wrapper">
                <div class="c_items">
                    <div class="c_item">
                        <?php foreach ($applications as $app) : ?>
                            <div class="ci_img">
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>03.03.2022 23:33</p>
                                <p><i class="fa fa-bookmark" aria-hidden="true"></i>Дороги</p>
                                <h3 class="ci_h3">Заголовок</h3>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="wrapper">
                <img class="f_img" src="img/logo2.svg" alt="Лого">
                <p class="f_p">© LifeПенза, 2022</p>
            </div>
        </footer>
    </body>
</html>