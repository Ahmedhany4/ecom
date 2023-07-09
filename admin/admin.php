<?php 
  session_start() ;
  if (!isset($_SESSION['admin_email'])) {
    header('Location: ../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop Online | إضافة منتجات</title>
  <link rel="stylesheet" href="css/index.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;
300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
</head>
<body>
  <Center>
    <div class="main">
      <form action="insert.php" method="post" enctype="multipart/form-data">
        <H2>  موقع تسويقى اونلاين</H2>
        <img src="image/Ecommerce campaign-pana.svg" alt="logo" width="65%"><br>
        <input type="text" name="name" placeholder="اسم المنتج"><br>
        <input type="text" name="price" placeholder="سعر المنتج"> <br>
        <input type="text" name="category" placeholder="القسم"> <br>
        <input type="file" id="file" name="image" style="display:none;" >
        <button name="upload">✅ رفع المنتج</button>
        <label for="file">رفع الصورة</label>
        <br><br>
        <a href="products.php">عرض كل المنتجات</a>
      </form>
    </div>
  </Center>
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
