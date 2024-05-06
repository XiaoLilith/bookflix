<?php
    include 'config.php';

    session_start();

    $user_id = $_SESSION['user_id'];
    $user_name =$_SESSION['user_name'];
    
    if(!isset($user_id)){
       header('location:login.php');
    }
    

    if(isset($_POST['send_msg'])) {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $msg = mysqli_real_escape_string($conn, $_POST['msg']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);

          mysqli_query($conn, "INSERT INTO msg (`user_id`,`name`,`email`, `number`, `msg`) VALUES('$user_id','$name','$email','$phone','$msg')") or die('Mesage send Query failed');
          $message[]='Nội dung được gửi thành công';
    }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Gửi phản hồi</title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/hello.css">
</head>

<body>

  <?php
  include 'index_header.php';
  ?>
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
  <div class="contact-section" >

    <h1>Gửi phản hồi</h1>
    <h3>Xin chào, <span><?php echo $user_name;?> </span> &nbsp;Bạn cần giúp gì?</h3>
    <div class="border"></div>
    <form class="contact-form" action="" method="post">
      <input type="text" class="contact-form-text" name="name" placeholder="Tên bạn">
      <input type="email" class="contact-form-text" name="email" placeholder="Email bạn">
      <input type="int" class="contact-form-text" name="phone" placeholder="Số điện thoại ">
      <textarea class="contact-form-text" name="msg" placeholder="Nội dung "></textarea>
      <input type="submit" class="contact-form-btn" name="send_msg" value="Gửi">
      <a href="index.php" class="contact-form-btn"  >Trở về</a>
    </form>
  </div>

<?php include'index_footer.php';?>

<script>
setTimeout(() => {
  const box = document.getElementById('messages');
  box.style.display = 'none';
}, 5000);
</script>
</body>

</html>