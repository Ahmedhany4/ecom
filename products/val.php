<?php 
require 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `products` WHERE id = $id";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;
  300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تأكيد شراء المنتج</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="css/products.css">
</head>
<style>
  input {
    display: none;
  }
  .main {
    width: 60%;
    padding: 20px;
    margin-top: 115px;
    box-shadow: 1px 1px 10px silver;
    border-radius: 10px;
  }
  h2 {
    font-size: 2.5em;
  }
  .mylink {
    font-size: 1.5em ;
    text-decoration: none;
    font-weight: 600;
    color: tomato;
    border: 1px solid tomato;
    padding: 5px;
    margin-bottom: 15px ;
    margin-top: 15px ;
    border-radius: 5px;
    display: inline-block;
    transition: all 0.3s;
}
.mylink:hover {
  color: #fff;
  background-color: tomato;
}
</style>
<body>
  <center>
    <div class="container">
      <div class="main">
      <form action="insert_card.php" method="post">
        <h2>هل تريد فعلا شراء المنتج</h2>
        <input type="text" name="id" value="<?= $data['id'] ?>">
        <input type="text" name="name" value="<?= $data['name'] ?>">
        <input type="text" name="price" value="<?= $data['price'] ?>">
        <input type="text" name="image" value="<?= $data['image'] ?>">
        <!-- <input type="text" name="quantity" value="<?= $count ?>"> -->
        <button  name="add"  class="btn btn-warning" type="submit" style="font-size: 1.5em; margin-bottom: 20px;">تأكيد شراء المنتج</button>
        <br>
        <a href="shop.php" class="mylink" >الرجوع لصفحة المنتجات </a>
      </form>
      </div>
    </div>
  </center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>