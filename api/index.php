<?php
    require '../db.php';

    if ($_GET['method'] == 'solved_tasks') {
        $count = R::count('applications');
        $arr = ['status'=>'ok', 'count'=>$count];
        $json = json_encode($arr);
        echo $json;
    }

    if ($_POST['method'] == 'auth') {
        $user = R::findOne('users', 'WHERE `login` = "'.$_POST['login'].'"');
        if ($user) {
            if (md5($_POST['password']) == $user->password) {
                $_SESSION['user'] = $user;
                $arr = ['status'=>'ok'];
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