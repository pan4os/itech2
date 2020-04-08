<html>
   <head>
   <meta charset="utf-8">
      <title>
          In stock
     </title>
   </head>
   <body>

<?php 
include 'connect.php';
header('Content-type: text/html; charset=utf-8');

    echo '     <form action="1.php" method="POST">
                   <b>Вывести по производителю</b>
                   <select name="vendor">';
$res = $dbh -> query('select `ID_Vendors`, `name` from `vendors`');
 while($row = $res ->fetch(PDO::FETCH_ASSOC))
{    
 echo'    <option value="',
$row['ID_Vendors'],'">',$row['name'],
'</option>';   
}

      echo' </select>
                   <input type="submit" name="send" value="Ок">
                    </form>' ; 


                    echo '     <form action="2.php" method="POST">
                    <b>Вывести товары по категории</b>
                    <select name="category">';
 
 $res2 = $dbh -> query('select `ID_Category`, `name` from `category`');
 while($row2 = $res2 ->fetch(PDO::FETCH_ASSOC))
 {    
  echo'    <option value="',
 $row2['ID_Category'],'">',$row2['name'],
 '</option>';   
 }
 
       echo' </select>
                    <input type="submit" name="send" value="Ок">
                     </form>' ; 
       echo '<form action="3.php" method="POST"> 
            <b>Введите минимальную цену</b>
            <input type="number" min="1" name="minimum"><br>  
            <b>Введите максимальную цену</b> 
            <input type="number" min="1" name="maximum"><br> ';
      echo' </select>
            <input type="submit" name="send" value="Ок">
             </form>' ;

 
?>
</body>
</html>