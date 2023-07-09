<?php
require_once'admin/config.php';

if(isset($_POST['submit'])){
  $name =  $_POST['name'];
  $email =  $_POST['email'];
  $password =  sha1($_POST['password']);
  $cpassword =  sha1($_POST['cpassword']);
  if($cpassword==$password){
    $select = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") ;
    if(mysqli_num_rows($select) > 0){
        $message[] = 'user already exist!';
    }else{
        mysqli_query($con, "INSERT INTO `users`(`name`, `email`, `password`) VALUES('$name', '$email', '$password')") ;
        $message[] = 'registered successfully!';
        header('location:login.php');
    }
  }else {
    $message[] = 'password not matched!';
  }
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | تسجيل حساب</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;
  00;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="admin/css/register.css">
  </head>
  <body>
    <center style="margin: 90px 0 0 0;">
      <!-- <div class="container" style="width: 40%"> -->
      <div class="container form-container">
      <?php
        if(isset($message)){
          foreach($message as $message){
            // echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
            echo'
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>'.$message.'</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          }
          ?>
          <!-- </div> -->
<!!--===============================================================================================  -->
        <form action="" method="post">
            <h3>انشاء حساب جديد</h3>
            <input type="text" name="name" required placeholder="اسم السمتخدم" class="box"><br>
            <input type="email" name="email" required placeholder="البريد الالكتروني" class="box"><br>
            <input type="password" name="password" required placeholder="كلمة المرور" class="box"><br>
            <input type="password" name="cpassword" required placeholder="تأكيد كلمة المرور" class="box"><br>
            <!-- <input type="submit" name="submit" class="btn btn-primary" value="تسجيل حساب"> -->
            <button type="submit" name="submit" class="btn btn-success mybtn"> تسجيل حساب</button>
            <p >هل لديك حساب؟ <a href="login.php" class="btn btn-primary"> تسجيل دخول</a></p>
        </form>
      </div>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/js/jquery-3.6.4.min.js"></script>
    <script src="admin/js/script.js"></script>
  </body>
</html>