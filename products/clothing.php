<?php 
  session_start() ;
  if (!isset($_SESSION['user_name'])) {
    header('Location: ../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clothing | الملابس</title>
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
  .mywhite {
    color: #fff;
  }
  .mywhite:hover {
    color: #ffffffab;
  }
  .mywhite:focus {
    color: #fff;
  }
  .mycate {
    color: #E1D6D0 ;
    font-weight: bold;
    transition: all 0.3s;
  }
  .mycate:hover {
    color:#e1d6d0c7 ;
  }
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
      <a  class="navbar-brand mynav-link"  href="card.php" >عربتي | MyCard</a>
      <a  class="navbar-brand mynav-link mycate"  href="" > الملابس| Clothing </a>
      <div class="dropdown">
          <a class="btn mywhite dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo (isset($_SESSION['user_name']))? $_SESSION['user_name'] : 'الاقسام'; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="food.php">الطعام</a></li>
            <li><a class="dropdown-item" href="clothing.php">الملابس</a></li>
            <li><a class="dropdown-item" href="elect.php">الإلكترونيات</a></li>
            <li><a class="dropdown-item" href="../logout.php">تسجيل الخروج</a></li>
          </ul>
        </div>
    </div>
  </nav>
  <div class="imagebackground" style=" overflow: hidden; height: 92vh; ">
    <img src="../admin/image/clothing1.jpg" class="image" alt="Clothing" style=" width: 100%; height: 109vh; ">
  </div>
  <?php 
  require_once 'config.php';
  $sql = "SELECT * FROM products WHERE `category`='Clothing' OR  `category`='clothing'";
  $data= mysqli_query($con,$sql);
  while ($row = mysqli_fetch_assoc($data)){
    echo "
    <center>   
      <main class=\"container\">
        <div class='card' style='width: 18rem;'>
          <img src='../admin/$row[image]' class='card-img-top' alt='product' >
          <div class='card-body'>
          <span class='card-text category'>($row[category])</span>
            <h5 class='card-title myh5'>$row[name]</h5>
            <p class='card-text'>$row[price]</p>
            <a href='val.php? id=$row[id]' class='btn btn-primary'> إضافة المنتج للعربة</a>
          </div>
        </div>
      </main  >
    </center>";
  }
  ?>
  <script src ="js/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>