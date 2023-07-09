<?php
  $con=mysqli_connect('localhost','root','','onlineshop');

  // for ($i=1; $i<14; $i++){
  //   $query="INSERT INTO `products`( `name`, `price`, `image` ,`category`)
  //   VALUES (CONCAT('Clothing ',$i) ,CONCAT('$',400+$i) , CONCAT('image/clohting/','$i' ,'.jpg') , 'Clothing'  )";
  //   mysqli_query($con,$query);
  // }