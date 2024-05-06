<?php
    include 'config.php';
    if(isset($_POST['submit'])) {
      $name = mysqli_real_escape_string($conn, $_POST['Name']);
      $Sname = mysqli_real_escape_string($conn, $_POST['Sname']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, ($_POST['password']));
      $cpassword = mysqli_real_escape_string($conn, ($_POST['cpassword']));
      $user_type = $_POST['user_type'];

      $select_users = $conn->query("SELECT * FROM users_info WHERE email = '$email'") or die('query failed');

      if(mysqli_num_rows($select_users)!=0){
        $message[]='Người dùng đã thoát!';
      }else{
        if($password !=$cpassword){
          $message[] = 'Xác nhận mật khẩu không khớp.';
        }else{
          mysqli_query($conn, "INSERT INTO users_info(`name`, `surname`, `email`, `password`, `user_type`) VALUES('$name','$Sname','$email','$password','$user_type')") or die('Query failed');
          $message[]='Đăng ký thành công';
        }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css">
    <title>Đăng ký</title>
  
  </head>
  <body>
  <?php
    if(isset($message)){
      foreach($message as $message){
        echo '
        <div class="message" id= "messages"><span>'.$message.'</span>
        </div>
        ';
      }
    }
    ?>
    <div class="wrapper">
        <img src="img.png" alt="">

        <div class="form-wrapper login">
        <form action="" method="post">
        <h3 style="color:white; font-size: 25px; padding: 0px 30px; ">Đăng ký <span style=" color:#404040; text-decoration: none; " >FreeBook & </span><span style=" color: #404040		; " >4.0</span></h3>
        <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="Name" placeholder="Nhập tên" required class="text_field ">
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="Sname" placeholder="Nhập họ" required class="text_field">
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" placeholder="Nhập Email" required class="text_field">
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password" placeholder="Nhập password" required class="text_field">
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="cpassword" placeholder="Nhập lại password" required class="text_field">
                </div>
                <select name="user_type" id="" required class="text_field">
                 <option value="User">User</option>
                  <option value="Admin">Admin</option>
                </select>
                <button type="submit" name="submit" class="btn text_field">Đăng ký</button>

                <div class="sign-link">
                    <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
                    <p><a href="index.php">Trở về trang chủ </a></p>

                </div>
            </form>
        </div>
    </div>
    <script>
setTimeout(() => {
  const box = document.getElementById('messages');

  // 👇️ hides element (still takes up space on page)
  box.style.display = 'none';
}, 8000);
</script>

  </body>
</html>
