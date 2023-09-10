<?php
session_start();

    require_once 'mysql.php';


    $login              = $_POST['login'];
    $password      = $_POST['password'];
    $id_product     = $_POST['id_product'];
/*
    $status_index = $_POST['status_index'];
    $model_index = $_POST['model_h'];
    $price_index    =$_POST['price_h'];
    $id_product_index = $_POST['id_product_h'];
*/
    $id_customer = $_SESSION['id'];
    $quit           =$_POST['quit'];

    if(isset($login) and isset($password)) {
        
        $login          = mysqli_real_escape_string($link, trim($login));
        $password  = mysqli_real_escape_string($link, trim($password));
        $sql              = mysqli_query($link, "SELECT * FROM `customer` WHERE `login` = '{$login}' AND `password` = '{$password}' ");
            if(mysqli_num_rows($sql) == 0) {
               	echo  "Авторизуйтесь чтобы купить!";
	          } else {
                 $rows_sql= mysqli_fetch_assoc($sql);
                 $_SESSION['id'] = $rows_sql['id_customer'];
                 echo $_SESSION['id'];
                 echo "<br />";
/*
                 global $id_customer;
                 $id_customer = $_SESSION['id'];
                 echo $id_customer;
*/
            }
             
    } elseif ($_SESSION['id'] == true) {
	
	    echo "Вы авторизованны ";
	
	}	else {
            echo "Авторизуйтесь чтобы сделать покупку!";
            echo "<br />";
   }
    
    if($quit == 'on'){
	
	    $quit = false;
	
	    unset($_SESSION['id']);
	} else {
	
	    echo "";
	}

/*

          if($status_index == 'on') {
        $add_product_index = mysqli_query($link, "INSERT INTO `order_customer`(`model` , `price` , `id_product` ,`id_customer`)  VALUES  ('$model_index' , '$price_index' , '$id_product_index' 
, '$id_customer')");
            
             if($add_product_index == true) {
            echo "Покупка добавлена в корзину!";
        } else {
            echo "Ошибка добавления записи в БД!".mysqli_error($link).PHP_EOL;
            echo "<br />";
            echo " Код ошибки errno : ".mysqli_connect_errno().PHP_EOL;
            echo "<br />";
        }

    } else {
	
       	echo  "";
     
          echo "Ошибка :".mysqli_error($link).PHP_EOL;
          echo "<br />";
          echo " Код ошибки errno : ".mysqli_connect_errno().PHP_EOL;
          echo "<br />";
 

    }

*/

//форма поиска 

echo <<<FORMA
<html>
<heade>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<form name="search_product" method="POST" action="search.php">
Поиск по модели товара: </br>
<input type="search" name="search" />
<br />
<br />
<input type="submit"  value="Поиск" />

</form>

</body>
</html>
FORMA;

// форма входа

echo <<<FORMA
<html>
<heade>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<form method="POST"  >

Имя:<br /> <input type="text" name="login" >
<br />
Пароль:<br /> <input type="text" name="password" >
<br />

<input type="submit" name="log_in" value=" Войти ">
<br />

<input type="checkbox"  name "quit" >
<br />

<input type="submit" name="log_out"  value="Выйти">
<br />

</form>

</form>

</body>
</html>

FORMA;

      
    $result_all_product = mysqli_query($link, "SELECT * FROM `product` ") ;
        while($rows_all_product = mysqli_fetch_assoc($result_all_product)) {

	         
	
            echo "<div>";

            echo "<br />";
            echo "Модель: ";
            echo "<br />";
            echo "<a href='article_product.php?id_product={$rows_all_product['id_product']}'>".htmlspecialchars($rows_all_product['model'])."</a>" ;
            echo "<br />";
            echo "<br />";
    
            echo "Описание : ";
            echo "<br />";
            $descripton = htmlspecialchars($rows_all_product['description']);
            echo $descripton;
            echo "<br />";
   
            

            echo "</div>";

            echo "<br />";

            echo "<br />";
            echo "<br />";

    }

 
?>
