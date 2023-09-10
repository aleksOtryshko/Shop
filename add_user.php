<?php

    require_once 'mysql.php';

     $res = mysqli_query($link, "INSERT INTO `personal`(`log`, `password`) VALUES ('user1', '123')");

        if($res == true) {
            echo "Пользователь добавлен в БД !";
        } else {
            echo "Ошибка добавления записи в БД!".mysqli_error($link).PHP_EOL;
            echo "<br />";
            echo " Код ошибки errno : ".mysqli_connect_errno().PHP_EOL;
            echo "<br />";
        }

?>       