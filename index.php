<?php
    require 'db.php';
    $applications = R::find('applications', 'WHERE status = 1 ORDER BY id DESC LIMIT 4');
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
                <?php if (!isset($_SESSION['user'])) :?>
                    <a class="pm_a" href="/admin">Войти</a>
                    <a class="pm_a" href="/register">Зарегистрироваться</a>
                <? else : ?>
                    <p class="pm_name"><?php echo $_SESSION['user']->surname ?> <?php echo $_SESSION['user']->name ?></p>
                    <?php if ($_SESSION['user']->position == '1') :?>
                        <a class="pm_a" href="/admin">Войти в панель управления</a>
                    <?php else : ?>
                        <a class="pm_a" href="/admin">Войти в личный кабинет</a>
                    <?php endif ?>
                    <a class="pm_a" href="/admin?logout">Выйти</a>
                <?php endif ?>
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
                <h2>Решенных заявок: <span id="count"><i class="fa fa-refresh fa-spin fa-fw margin-bottom"></i></span></h2>
                <div class="hr"></div>
            </div>
        </section>
        <section class="content">
            <div class="wrapper">
                <div class="c_items">
                    <?php foreach ($applications as $app) : ?>
                        <div class="c_item">
                            <style>
                                .ci_img_<?=$app['id']?> {
                                    background-image: url(img/app/<?=$app['photo_posle']?>);
                                }
                                                    
                                .ci_img_<?=$app['id']?>:hover {
                                    background-image: url(img/app/<?=$app['photo_do']?>);
                                }
                            </style>
                            <div class="ci_img ci_img_<?=$app['id']?>"></div>
                            <div></br>
                                <h3 class="ci_h3"><?=$app['title']?></h3>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i><?=$app['date']?></p>
                                <p><i class="fa fa-bookmark" aria-hidden="true"></i><?=$app['rubrika']?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <footer>
            <div class="wrapper">
                <img class="f_img" src="img/logo2.svg" alt="Лого">
                <p class="f_p">© LifeПенза, 2022</p>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            function ajax() {
                $.ajax({
                    url: '/api/',         /* Куда пойдет запрос */
                    method: 'get',             /* Метод передачи (post или get) */
                    dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
                    data: {method: 'solved_tasks'},     /* Параметры передаваемые в запросе. */
                    success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                        $('#count').text(data['count']);
                    }
                });
            }

            setInterval(ajax, 5000);
        </script>
    </body>
</html>