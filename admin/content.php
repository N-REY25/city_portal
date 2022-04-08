<?php
    //Проверка на авторизацию
    if (!isset($_SESSION['user'])) {
        header('Location: /admin');
    } else {
        $rubriks = R::findAll('rubriks');
        $applications = R::findAll('applications');
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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
        <?php if ($_GET['page'] == 'categories') : ?>
            <section class="categories_section">
                <div class="wrapper">
                    <div class="cs_create">
                        <h2>Добавить рубрику</h2>
                        <div class="csc_input">
                            <input id="name_cre" type="text" placeholder="Введите название рубрики">
                            <button onclick="cre_ajax()">Добавить</button>
                        </div>
                    </div>
                    <div class="cs_viewer">
                        <h2>Категории</h2>
                        <div class="csc_rubriks">
                            <?php foreach ($rubriks as $rub) : ?>
                                <form class="csc_rub" action="/admin/" method="get">
                                    <h4><?=$rub['name']?></h4>
                                    <div class="cscr_input">
                                        <input type="text" name="name" value="<?=$rub['name']?>" style="display: none;">
                                        <input class="cscr_input_i" name="del_rub" type="submit" value="Удалить"></input>
                                    </div>
                                </form>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                function cre_ajax() {
                    $.ajax({
                        url: '/api/',         /* Куда пойдет запрос */
                        method: 'post',             /* Метод передачи (post или get) */
                        dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
                        data: {method: 'cre_rub', name: document.querySelector('#name_cre').value},     /* Параметры передаваемые в запросе. */
                        success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                            $(location).attr('href', '/admin?page=categories');
                        }
                    });
                }
            </script>
        <?php elseif ($_GET['page'] == 'archive') : ?>
        <section class="archive_section">
            <div class="wrapper">
                <div class="as_viewer">
                    <h2>Архив заявок</h2>
                    <div class="asc_applications">
                        <?php foreach ($applications as $app) : ?>
                            <div class="asc_rub" action="/admin/" method="get">
                                <h4><?=$app['title']?></h4>
                                <div class="ascr_text">
                                    <?php if ($app['status'] == 0) : ?>
                                        <p class="ascr_text_0">Новая</p>
                                    <?php elseif ($app['status'] == 1) : ?>
                                        <p class="ascr_text_1">Решена</p>
                                    <?php else : ?>
                                        <p class="ascr_text_2">Отклонена</p>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </section>
        <?php else : ?>
            <section class="content_dashboard">
                <?php if ($_SESSION['user']->position == "1") :?>
                    <img class="cd_img" src="../img/nRq.gif" alt="Котик 1">
                    <h1>404</h1>
                <?php else : ?>
                    <img class="cd_img" src="../img/nRq.gif" alt="Котик 1">
                    <h1>404</h1>
                <?php endif ?>
            </section>
        <?php endif ?>
    </body>
</html>