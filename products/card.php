<?php 
  session_start() ;
  if (!isset($_SESSION['user_name'])) {
    header('Location: ../index.php');
  }
?>
<?php 
  require_once "config.php";
  $select ="SELECT * FROM `addcard`";
  $result = mysqli_query($con,$select);
  $sum=0 ;
  ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>عربتي |  منتجاتي</title>
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
  center h3{
    text-align: center;
    color: #0d6efd;
    font-size: 2.5em;
    margin: 30px 20px 20px;
    box-shadow: 1px 1px 10px #c0c0c0b3;
    width: fit-content;
    padding: 10px 15px;
    border-radius: 10px;
  }
  table {
    box-shadow: 1px 1px 10px silver;
    padding: 1.5rem 0.5rem;
  }
  thead {
    background-color: #0d6efd;
    color: #fff;
    text-align: center;
    font-size: 1.56em;
  }
  tbody {
    text-align: center;
    font-size: 1.3em;
    vertical-align: center;
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
.myorder {
    font-size: 1.5em ;
    text-decoration: none;
    font-weight: 600;
    color: #fff;
    background-color: #409553;
    border: 1px solid #409553;
    padding: 5px 25px;
    margin-bottom: 15px ;
    margin-top: 15px ;
    border-radius: 5px;
    display: inline-block;
    transition: all 0.3s;
}
.myorder:hover {
  color: #409553;
  background-color: #fff;
}
.total {
padding: 5px;
}
.price {
  padding: 5px;
}
.price , .total{
  font-size: 1.5em;

}
.mytfoot {
  background-color: #0d6efd;
  color: #fff;

}

</style>
<body>
<center>
  <h3>طلباتك</h3>
  <main>
    <div class='container'> 
      <table class='table'>
          <thead>
            <tr>
              <th scope='col'style="padding: 22px 0px;"> Image</th>
              <th scope='col'style="padding: 22px 0px;">Product Name</th>
              <th scope='col'style="padding: 22px 0px;">Product Price</th>
              <!-- <th scope='col'style="padding: 22px 0px;">Count</th> -->
              <!-- <th scope='col'style="padding: 22px 0px;">The total price</th> -->
              <th scope='col'style="padding: 22px 0px;">Delete Product</th>
            </tr>
          </thead>
<?php 
  while($row = mysqli_fetch_array($result)){
    $pricee= explode('$',$row['price']);
    $qty= $row['quantity'];
    $price = $pricee[1] ;//* $qty ;
    $sum+=$price ;

    echo"
          <tbody>
            <tr>
            
              <td style='padding: 1px;'><img src='../admin/$row[image]' alt='image' style='width: 75px;height: 75px;border-radius: 50%;border: 1px solid gray;''></td>
              <td style='padding: 25px;'> $row[name]  </td>
              <td style='padding: 25px;'>$$price </td>
              <td><a href='del_card.php? id=$row[id]' class='btn btn-danger' style='padding: 13px 32px;font-size: 1.2em;'>إزلة</a></td>
            </tr>
          </tbody>
";}
  ?>
  <?php 
  echo"
  <tfoot class='mytfoot'>
    <tr>
      <td colspan='2' class='total' style=' font-weight: 600; font-size: 2em; padding: 5px 45px; '>Total Price</td>
      <td colspan='2'class='price'style=' font-weight: 600; font-size: 2em; padding: 0px 140px; '>$$sum</td>
    </tr>
  </tfoot>";
  ?>
        </table>
        <a href="shop.php" class="mylink" >الرجوع لصفحة المنتجات </a>
        <?php
            if ($sum>0){
              echo "
              <form action='order.php' method='post' style=' display: inline-block; '>
                <button class='myorder' name='order' type='submit' style=' margin-left: 10px; '>  تأكيد الطلب </button>
              </form>
            ";}
          ?>
      </div>
    </main>
  </center>
  <script src ="js/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>