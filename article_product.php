<?php
session_start();
require_once 'mysql.php';

    $id_product = $_GET['id_product'];
    $status          = $_POST['status'];

   

    if($id_product == true) {
        $result_article = mysqli_query($link, "SELECT * FROM `product` WHERE `id_product` = '$id_product' ") ;
        $rows_article = mysqli_fetch_assoc($result_article);

     	        echo "<div>";
	            echo "Модель:  ";
     	        echo htmlspecialchars($rows_article['model']);
     	        echo "<br />";
     	        echo "<br />";
     	        echo "</div>";

     	        echo "<div>";
	            echo  "Описание:  ";
	            echo "<br />";
     	        echo htmlspecialchars($rows_article['description']);
     	        echo "<br />";
     	        echo "</div>";
      
                echo "<div>";
                $cont_decode = $rows_article['img'];
                echo  "<img src=\"data:image/png;base64,$cont_decode\"/>";
                echo "<br />";
                echo "</div>";


                echo "<div>";
                 
                $model           = $rows_article['model'];
                $price             = $rows_article['price'];
                $id_customer = $_SESSION['id'];
                


echo <<<FORMA
<html>
<heade>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<form method="POST"  >


В корзину <br /> <input type="checkbox" name="status">
<br /> 

<input type="submit" name="buy" value=" Купить ">


</form>


</body>
</html>

FORMA;


    if($status == 'on') {
        $add_product = mysqli_query($link, "INSERT INTO `order_customer`(`model` , `price` , `id_product` ,`id_customer`)  VALUES  ('$model' , '$price' , '$id_product' 
, '$id_customer')");
            
             if($add_product == true) {
            echo "Покупка добавлена в корзину!";
        } else {
            echo "Ошибка добавления записи в БД!".mysqli_error($link).PHP_EOL;
            echo "<br />";
            echo " Код ошибки errno : ".mysqli_connect_errno().PHP_EOL;
            echo "<br />";
        }

    } else {
           echo "Ошибка :".mysqli_error($link).PHP_EOL;
          echo "<br />";
          echo " Код ошибки errno : ".mysqli_connect_errno().PHP_EOL;
          echo "<br />";
    }


      echo "</div>";


    } else {

	      echo "Ошибка :".mysqli_error($link).PHP_EOL;
          echo "<br />";
          echo " Код ошибки errno : ".mysqli_connect_errno().PHP_EOL;
          echo "<br />";
    }


     echo "<a href='index.php'>На главную</a>";


?>