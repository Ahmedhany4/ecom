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
  <title>Products | المنتجات</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/index.css"> -->
  <link rel="stylesheet" href="css/products.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;
300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
</head>
<style>
  .category {
    color: gray;
  }
  .myh5 {
    display: inline-block;
  }
  .card img {
    width: 100%;
    height: 346.06px;
  }
</style>
<body>
<nav class="navbar navbar-dark bg-dark mynav">
    <div class="container">
      <div class="dropdown">
          <a class="btn mywhite dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style=" color: #FFF; ">
              <?php echo (isset($_SESSION['admin_name']))? $_SESSION['admin_name'] : 'الاقسام'; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="../logout.php">تسجيل الخروج</a></li>
          </ul>
        </div>
    </div>
  </nav>
  
  <center>
    <h2>لوحة تحكم الادمن</h2>
  </center>
  <?php 
  require_once 'config.php';

  $sql = "SELECT * FROM products";

  $data= mysqli_query($con,$sql);
  
  while ($row = mysqli_fetch_assoc($data)){
    echo "
    <center>   
      <main class=\"container\">
        <div class='card' style='width: 18rem;'>
          <img src='$row[image]' class='card-img-top' alt='product'>
          <div class='card-body'>
            <h5 class='card-title myh5'>$row[name]</h5>
            <span class='card-text category'>($row[category])</span>
            <p class='card-text'>$row[price]</p>
            <a href='update.php? id=$row[id]' class='btn btn-success'>تعديل المنتج</a>
            <a href='delete.php? id=$row[id]' class='btn btn-danger'>حذف المنتج</a>
          </div>
        </div>
      </main  >
    </center>";
  }
  ?>
  <?php ?>
  <script src ="js/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>