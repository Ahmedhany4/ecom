<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update | تعديل منتج </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/products.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;
300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
</head>
<style>
  input {
    width: 317px;
  }
</style>
<body>
  <?php
  require_once 'config.php';
  $id = $_GET['id'];
  $query = "SELECT * FROM products WHERE id = '$id'";
  $result = mysqli_query($con, $query);
  $data = mysqli_fetch_array($result);
  ?>
  <Center>
    <div class="main">
      <form action="up.php" method="post" enctype="multipart/form-data">
        <H2> تعديل المنتجات</H2>
        <input type="text" name="id" placeholder="id "value="<?= $data['id']?>" readonly><br>
        <input type="text" name="name" placeholder="اسم المنتج" value="<?= $data['name']?>"><br>
        <input type="text" name="price" placeholder="سعر المنتج" value="<?= $data['price']?>"> <br>
        <input type="text" name="category" placeholder="القسم " value="<?= $data['category']?>"> <br>
        <input type="file" id="file" name="image" style="display:none;" >
        <label for="file">تحديث صورة المنتج</label>
        <button name="update" type='submit'> تعديل المنتج </button>
        <br><br>
        <a href="products.php">عرض كل المنتجات</a>
      </form>
    </div>
  </Center>
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
