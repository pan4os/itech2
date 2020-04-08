<?php
        //echo $_POST['vendor'];
        try{
        include 'connect.php';
$res = $dbh -> prepare("SELECT items.name,`price`,`quantity`,`quality`
                        FROM `items` inner join category on items.FID_Category=category.ID_Category
                        WHERE items.FID_Category=(:category)
                        ");
                         
$res->bindParam(':category', $category_tmp);
$category_tmp = $_POST['category'];
  
        
echo '<table border="1">',
        '<tr><th>Part name</th><th>Price</th><th>Quantity</th><th>Quality</th></tr>';
$res->execute();
while($row = $res ->fetch(PDO::FETCH_ASSOC))
{    
             echo '<tr>
                         <td>',$row['name'],'</td>',
                        '<td>',$row['price'],'</td>',
                        '<td>',$row['quantity'],'</td>',
                        '<td>',$row['quality'],'</td>',
                        
               
                '</tr>';   
}
}
catch (Exception $e){
        $dbh->rollBack();
  echo "Ошибка: " . $e->getMessage();
}
echo '</table><br><a href="index.php">Назад</a>';
 ?>