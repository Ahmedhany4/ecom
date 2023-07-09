<?php 
require_once 'config.php';

if (isset($_POST['upload'])){
  $name=$_POST['name'];
  $price=$_POST['price'];
  $category=$_POST['category'];
  $image=$_FILES['image'];
  $image_location=$_FILES['image']['tmp_name'];
  $image_name=$_FILES['image']['name'];
  $image_up ="image/" . $image_name ;
  $insert="INSERT INTO products (`name`,`price`,`image`,`category`)  
  VALUES ('$name','$price','$image_up','$category')";
  mysqli_query($con,$insert);
  if (move_uploaded_file($image_location,$image_up)){
    echo "<script>alert('تم رفع المنتج') </script>";
  }
  else {
    echo "<script>alert(' حدث مشكلة لم يتم رفع المنتج') </script>";
  }
  header('location: admin.php');
}
