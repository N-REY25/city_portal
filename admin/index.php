<?php
    require '../db.php';

    if (isset($_GET['del_rub'])) {
        $applications = R::findAll('applications', 'WHERE rubrika = "'.$_GET['name'].'"');
        foreach ($applications as $app) {
            $trash = R::load('applications', $app['id']);
            R::trash($trash);
        }
        $rubrik = R::findOne('rubriks', 'WHERE name = "'.$_GET['name'].'"');
        $trash = R::load('rubriks', $rubrik->id);
        R::trash($trash);
        header('Location: /admin?page=categories');
    }

    // Выход
    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header('Location: /admin');
    }

    // Обработка отображения страниц
    if (isset($_SESSION['user'])) {
        switch ($_GET['page']) {
            case 'categories': include 'content.php';
            break;
            case 'archive': include 'content.php';
            break;
            case 'new_applications': include 'content.php';
            break;
            case 'create_applications': include 'content.php';
            break;
            case 'my_applications': include 'content.php';
            break;
            default: include 'dashboard.php';
        }
    } else {
        include 'login.html';
    }