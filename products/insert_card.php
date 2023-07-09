<?php 
session_start();
$user_id= $_SESSION['user_id'];
// $product_id= $_SESSION['product_id'];
require_once 'config.php';
if (isset($_POST['add'])){
  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_POST['image'];
  $insert = "  INSERT INTO `addcard`( `user_id`, `name`, `price`, `image`) 
  VALUES ('$user_id','$name','$price','$image'  )
  ";
  /*
  INSERT INTO `addcard`( `user_id`, `name`, `price`, `image`, `quantity`, `product_id`) VALUES ()
-- user_id --> $row['id']
-- product_id --> $row['id']
  */
    mysqli_query($con,$insert);
    header("location: shop.php");
} 