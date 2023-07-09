<?php 
session_start() ;
if (isset($_SESSION['admin_email'])) {
  header('Location: admin.php');
}
require_once 'config.php';
  if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hpassword=sha1($password);
    // echo $name . '     ' . $hpassword ; 
    $query = "SELECT * FROM `users` 
    WHERE email='$email' AND password ='$hpassword' AND admin = 1 ";
    $result = mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    $count_ROWS=mysqli_num_rows($result) ;
    // echo $count_ROWS ;

      // count_ROWS > 0   Admin
    if ($count_ROWS >0) {
      $_SESSION['admin_email'] = $email ;
      $_SESSION['admin_name'] =$row['name'];
      $_SESSION['user_id'] =$row['id'];
      header('Location: admin.php');
      exit();
    }
    else{
      $message[] = 'incorrect password or email!';
    }
    
    // echo $_SESSION['email'] = $email .'       '.$_SESSION['admin'] ;

  }

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | تسجيل دخول</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;
  00;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <center>
      <div class="form-container  container">
      <?php
      if(isset($message)){
        foreach($message as $message){
            echo'
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>'.$message.'</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
      }
      ?>
          <form action="<?= $_SERVER['PHP_SELF']?>" method="post" >
            <h3>  تسجيل الدخول الأدمن</h3>
            <input type="email" name="email" required placeholder="البريد الالكتروني" class="box"><br>
            <input type="password" name="password" required placeholder="كلمة المرور" class="box"><br>
            <button type="submit" name="submit" class="btn btn-primary mybtn" >تسجيل الدخول</button>
        </form>
      </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
