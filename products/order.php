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
  <title>Order | الاوردر</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/index.css"> -->
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;
300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
</head>
<style>
  div.container {
    margin: 141px auto;
    width: 50%;  
    border-radius: 10px !important;

  }
  div.container h2 {
    font-size: 3em;
    padding: 20px;
    margin: 10px;
    font-weight: bolder;
    line-height: 2.5  ;
  }
  .mydiv {
    border-top-left-radius: 145px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 145px;
    border-bottom-left-radius: 5px;
}
</style>
<body>
<?php 
require_once '../admin/config.php' ;
// if(isset($_POST['order'])){
//   $query = "INSERT INTO `order` SELECT * FROM `addcard`";
//   mysqli_query($con,$query);
// }
// else {
//   echo  "
//       <div class='alert alert-danger' role='alert'>
//           لم تتم عملية الشراء 
//       </div>
//     ";die;
// }
?>
  <center>
    <div class="container">
      <div class="alert alert-info mydiv" role="alert">
      <h2>لقد تم تأكيد الاوردر <br>
      سوف يتم التوصيل خلال يومين</h2>
      </div>
    </div>
  </center>
<script src ="js/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>