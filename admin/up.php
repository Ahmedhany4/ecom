<?php 
require_once 'config.php';
if (isset($_POST['update'])){
  try{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $category=$_POST['category'];
    //check admin add new image , else use old image
    if ($_FILES['image']['size']){
      $image=$_FILES['image'];
      $image_location=$_FILES['image']['tmp_name'];
      $image_name=$_FILES['image']['name'];
      $image_up ="image/" . $image_name ;
      move_uploaded_file($image_location,$image_up);
      $update="UPDATE `products` SET `image`='$image_up' WHERE `id`= $id";
      mysqli_query($con, $update);
    }
    $update="UPDATE `products` SET `name`='$name',`price`='$price' ,`category`='$category ' WHERE `id`= $id ";
    mysqli_query($con,$update);
    echo "<script> alert('تم تحديث المنتج') ; </script>";
  } catch(Exception $ex) {
      echo "<script> alert(' حدث مشكلة لم يتم تحديث المنتج'); </script>";
  }
  header("Location: products.php");
  die;
}