<?php
    require '../db.php';

    if ($_GET['method'] == 'solved_tasks') {
        $count = R::count('applications', 'WHERE status = 1');
        $arr = ['status'=>'ok', 'count'=>$count];
        $json = json_encode($arr);
        echo $json;
    }

    if ($_POST['method'] == 'auth') {
        $user = R::findOne('users', 'WHERE `login` = "'.$_POST['login'].'"');
        if ($user) {
            if (md5($_POST['password']) == $user->password) {
                $_SESSION['user'] = $user;
                $arr = ['status'=>'successful'];
                $json = json_encode($arr);
                echo $json;
            } else {
                $arr = ['status'=>'error', 'message'=>'Неверно введен пароль!'];
                $json = json_encode($arr);
                echo $json;
            }
        } else {
            $arr = ['status'=>'error', 'message'=>'Пользователь не найден!'];
            $json = json_encode($arr);
            echo $json;
        }
    }

    if ($_POST['method'] == 'reg') {
        $user = R::dispense('users');
        $user->name = $_POST['name'];
        $user->surname = $_POST['surname'];
        $user->patronymic = $_POST['patronymic'];
        $user->login = $_POST['login'];
        $user->email = $_POST['email'];
        $user->password = md5($_POST['password']);
        $user->position = 2;
        R::store($user);
        $arr = ['status'=>'successful'];
        $json = json_encode($arr);
        echo $json;
    }

    if ($_GET['method'] == 'login') {
        $user = R::findOne('users', 'WHERE `login` = "'.$_GET['login'].'"');
        if ($user) {
            $arr = ['status'=>'ok', 'login'=>true];
            $json = json_encode($arr);
            echo $json;
        } else {
            $arr = ['status'=>'ok', 'login'=>false];
            $json = json_encode($arr);
            echo $json;
        }
    }

    if ($_POST['method'] == 'cre_rub') {
        $post = R::dispense('rubriks');
        $post->name = $_POST['name'];
        R::store($post);
        $arr = ['status'=>'ok'];
        $json = json_encode($arr);
        echo $json;
    }