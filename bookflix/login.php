<?php
include 'config.php';
session_start();

if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


   $select_users = $conn->query("SELECT * FROM users_info WHERE email = '$email' and password='$password' ") or die('query failed');

    if (mysqli_num_rows($select_users) ==1) {

        $row = mysqli_fetch_assoc($select_users);

        if ($row['user_type'] == 'Admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['Id'];
            header('location:admin_index.php');

        } elseif ($row['user_type'] == 'User') {
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['Id'];
                header('location:index.php');
            }
        }
        else {
            $message[] = 'Email hoặc mật khẩu không chính xác!';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/register.css" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php
if(isset($message)){
      foreach($message as $message){
        echo '
        <div class="message" id="messages"><span>'.$message.'</span>
        </div>
        ';
      }
    }
    ?>
    <div class="wrapper">
        <img src="img.png" alt="">

        <div class="form-wrapper login">
        <form action="" method="post">
        <h3 style="color:white; font-size: 25px; padding: 0px 30px; ">Đăng Nhập <a href="index.php"><span style=" color:#404040		; " >FreeBook & </span><span style=" color: #404040		; " >4.0</span></a></h3>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" placeholder="Enter Email Id" required class="text_field">
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="password" placeholder="Enter password" required class="text_field">
                </div>
                <div class="forgot-pass">
                    <a href="#">Quên mật khẩu ?</a>
                </div>
                <button type="submit" name="login" class="btn text_field">Đăng nhập</button>
                <div class="sign-link">
                    <p>Bạn chưa có tài khoản? <a class="link" href="Register.php">Đăng ký ngay</a></p>
                    <p><a class="link" href="index.php">Trở về trang chủ</a></p>

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