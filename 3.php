<?php
        //echo $_POST['vendor'];
        
        include 'connect.php';
        if($_POST['minimum']<$_POST['maximum'])
        {
                $res = $dbh -> prepare("SELECT items.name,`price`,`quantity`,`quality`
                        FROM `items` 
                        WHERE `price` between (:minimum) and (:maximum)
                        ");
                         
$res->bindParam(':minimum', $minimum_tmp);
$minimum_tmp = $_POST['minimum'];
$res->bindParam(':maximum', $maximum_tmp);
$maximum_tmp = $_POST['maximum'];
  
        
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
        else echo '<b>Вернитесь и введите значения, чтобы минимальная цена была меньше максимальной</b>';


echo '</table><br><a href="index.php">Назад</a>';
 ?>