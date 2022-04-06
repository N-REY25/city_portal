<?php
    require '../db.php';

    // Выход
    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
        header('Location: /admin');
    }

    // Обработка отображения страниц
    if (isset($_SESSION['user'])) {
        switch ($_GET['page']) {
            case 'finished_works_up': include 'finished_works_up.php';
            break;
            default: include 'dashboard.php';
        }
    } else {
        include 'login.html';
    }