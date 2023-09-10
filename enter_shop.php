<?php
session_start();
require_once 'mysql.php';

    $login          = $_POST['login'];
    $password = $_POST['password'];

    if(isset($login) and isset($password)) {
        
        $login          = mysqli_real_escape_string($link, trim($login));
        $password  = mysqli_real_escape_string($link, trim($password));
        $sql       = mysqli_query($link, "SELECT * FROM `customer` WHERE `login` = '{$login}' AND `password` = '{$password}' ");
        $rows_sql= mysqli_fetch_assoc($sql);
        $_SESSION['id'] = $rows_sql['id_customer'];

	   if(mysqli_num_rows($sql) == 0) {
        	print "Неправильный пароль логин";
        } else {
header('Location: http://focfoc635.000webhostapp.com');
        } 
         

/*  АЛЬТЕРНАТИВНЫЙ ВАРИАНТ :

        $query = mysqli_query($link, "SELECT `passwoed` FROM `personal` WHERE `log`='".mysqli_real_escape_string($link, $_POST['log'])."' LIMIT 1");
            $data  = mysqli_fetch_assoc($query);
            if($data['password'] === $_POST['password']) {
        	    header('Location: admin.php');
        	    exit();
            } else {
        	    echo "Вы ввели неправильный лог - пароль!";
            }

*/

    }

?>    