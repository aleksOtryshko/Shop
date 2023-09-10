<<?php  
// файл поиска по модели

    require_once 'mysql.php';

    $search = $_POST['search'];
    $search = trim($search);
    $search = strip_tags($search);

    

    if(!empty($search)) {

      $result_search = mysqli_query($link, "SELECT * FROM `product` WHERE  `model` LIKE '%$search_request%'");
          $rows_search = mysqli_fetch_assoc($result_search);

               echo "<div>";
               echo htmlspecialchars($rows_search['model']);
               echo "<br />";
               echo "<br />";
               echo "</div>";

               echo "<div>";
               echo htmlspecialchars($rows_search['description']);
               echo "<br />";
               echo "<br />";
               echo "</div>";
               
               echo "<div>";
               echo "Цена: ".htmlspecialchars($rows_search['price'])." usd";
               echo "<br />";
               echo "<br />";
               echo "</div>";

               echo "<div>";
               echo "ID товара: ";
               echo htmlspecialchars($rows_search['id_product']);
               echo "<br />";
               echo "<br />";
               echo "</div>";


      
     
    } else {

          echo "Ошибка :".mysqli_error($link).PHP_EOL;
          echo "<br />";
          echo " Код ошибки errno : ".mysqli_connect_errno().PHP_EOL;
          
      }

 

?>  
    
