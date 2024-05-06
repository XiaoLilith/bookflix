<!-- <?php 
// session_start();
// if(isset($_GET['logout'])){
//     header('location:login.php');
// }
// ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Quản lý sách</title>
</head>
<body>
    
<header><div class="mainlogo">
        <div class="logo">
            <a href="admin_index.php"><span>FreeBook &</span>
            <span class="me">4.0</span></a>
        </div><p>Quản lý Admin</p></div>
        <div class="nav">
            <a href="admin_index.php">Trang chủ</a>
            <a href="add_books.php">Thêm sách</a>
            <a href="admin_orders.php">Đặt hàng</a>
            <a href="message_admin.php">Phản hồi</a>
            <a href="users_detail.php">Người dùng</a>

        </div>
        <div class="right">
            <div class="log_info">
                <p>Xin chào <?php echo $_SESSION['admin_name'];?></p> 
            </div>
            <a class="Btn" href="logout.php?logout=<?php echo $_SESSION['admin_name'];?>">Đăng xuất</a>
        </div>
    </header>

</body>
</html>