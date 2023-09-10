<?php
    require_once 'mysql.php';

    $category       = $_POST['category'];
    $model          = $_POST['model'];
    $description    = $_POST['description'];
    $price          = $_POST['price'];

echo <<<FORMA
<html>
<heade>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<form method="POST" enctype="multipart/form-data" >


Категория товара:
<select name="category">
    <option value="phone">Телефоны</option>
    <option value="household_appliances">Быт техника</option>
    <option value="accessory">Аксесуары</option>
</select><br />
<br />  

Модель:<br /> <input type="text" name="model" >
<br />

Описание:<br /> <textarea name="description"></textarea>
<br />

Изображение товара:<br />
<input type="file" name="img"><br />
<br />

Цена:<br /> <input type="text" name="price" >
<br />

<input type="submit" name="add_product" value=" Добавить товар ">

</form>

</body>
</html>
FORMA;


//обработчик какегорий товаров

    $content  = file_get_contents($_FILES[img][tmp_name]); 
    $content  = base64_encode($content);
    
    if(isset($category) and isset($model) and isset($description) and isset($content) and isset($price)) {    
    
        $category          = mysqli_real_escape_string($link, trim($category));
        $model             = mysqli_real_escape_string($link, trim($model));
        $description       = mysqli_real_escape_string($link, trim($description));
        $price             = mysqli_real_escape_string($link, trim($price));
        $content           = mysqli_real_escape_string($link, trim($content));
        
        $res_request_admin = mysqli_query($link, "INSERT INTO `product`(`category`, `model`, `description`, `img`, `price`) VALUE ('$category', '$model', '$description', '$content', '$price')");
        	
        if($res_request_admin == true) {
            echo "Категория добавлена в БД !";
        } else {
            echo "Ошибка добавления записи в БД!".mysqli_error($link).PHP_EOL;
            echo "<br />";
            echo " Код ошибки errno : ".mysqli_connect_errno().PHP_EOL;
            echo "<br />";
        }
    } else {
        echo " ?".PHP_EOL;
    }


?>
