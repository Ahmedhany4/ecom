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
  .mywhite {
    color: #fff;
  }
  .mywhite:hover {
    color: #ffffffab;
  }
  .mywhite:focus {
    color: #fff;
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
  /*
    .inputnumber {
      width: 70px;
      float: right;
      margin: 9px 20px -3px 0px;
      padding: 5.2px;
      border-radius: 32px;
      background-color: #fff;
      color: #0d6efd;
      border: 1px solid #0d6efd;
      font-weight: 700;
      transition: all 0.3s;
    }
    .inputnumber:focus ,.inputnumber:hover {
      background-color: #0d6efd;
      color: #fff;
    }
    .mybtn {
      float: right;
      margin: 9px 6px 6px 0px;
    }
  */
</style>
<body>
  <nav class="navbar navbar-dark bg-dark mynav">
    <div class="container">
      <a  class="navbar-brand mynav-link"  href="card.php" >عربتي | MyCard</a>
      <div class="dropdown">
          <a class="btn mywhite dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo (isset($_SESSION['user_name']))? $_SESSION['user_name'] : 'الاقسام'; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="food.php" target="_blank">الطعام</a></li>
            <li><a class="dropdown-item" href="clothing.php" target="_blank">الملابس</a></li>
            <li><a class="dropdown-item" href="elect.php" target="_blank">الإلكترونيات</a></li>
            <li><a class="dropdown-item" href="../logout.php">تسجيل الخروج</a></li>
          </ul>
        </div>
    </div>
  </nav>



  <center>
    <h2>جميع المنتجات المتوافرة</h2>
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
          <img src='../admin/$row[image]' class='card-img-top' alt='product'>
          <div class='card-body'>
          <span class='card-text category'>($row[category])</span>
            <h5 class='card-title myh5'>$row[name]</h5>
            <p class='card-text'>$row[price]</p>
            <a href='val.php? id=$row[id]' class='btn btn-primary mybtn'> إضافة المنتج للعربة</a>
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
<!-- 
            <form action='count.php' method='post'>
              <input type='text' name='quantity' placeholder='العدد' class='inputnumber'>
              <input type='submit' name='submit' id='submit' style = 'display: none ;' >
              </form>


 -->