<?php
        //echo $_POST['vendor'];
        try{
        include 'connect.php';
$res = $dbh -> prepare("SELECT items.name,`price`,`quantity`,`quality`
                        FROM `items` inner join vendors on items.FID_Vendor=vendors.ID_Vendors
                        WHERE items.FID_Vendor=(:vendor)
                        ");
                         
$res->bindParam(':vendor', $vendor_tmp);
$vendor_tmp = $_POST['vendor'];
  
        
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