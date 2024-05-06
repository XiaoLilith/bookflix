<?php
include 'config.php';

error_reporting(0);
session_start();

$user_id = $_SESSION['user_id'];

if (isset($_POST['add_to_cart'])) {
    if (!isset($user_id)) {
        $message[] = 'Please Login to get your books';
    } else {
        $book_name = $_POST['book_name'];
        $book_id = $_POST['book_id'];
        $book_image = $_POST['book_image'];
        $book_price = $_POST['book_price'];
        $book_quantity = '1';

        $total_price = number_format($book_price * $book_quantity);

        $select_book = $conn->query("SELECT * FROM cart WHERE book_id= '$book_id' AND user_id='$user_id' ") or die('query failed');

        if (mysqli_num_rows($select_book) > 0) {
            $message[] = 'This Book is alredy in your cart';
        } else {
            $conn->query("INSERT INTO cart (`user_id`,`book_id`,`name`, `price`, `image`,`quantity` ,`total`) VALUES('$user_id','$book_id','$book_name','$book_price','$book_image','$book_quantity', '$total_price')") or die('Add to cart Query failed');
            $message[] = 'Book Added To Cart Successfully';
            header('location:index.php');
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/hello.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <title>Web học tập có hỗ trợ chatgpt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="giohang.css">
    <style>
        img {
            border: none;
        }
        .message {
  position: sticky;
  top: 0;
  margin: 0 auto;
  width: 61%;
  background-color: #fff;
  padding: 6px 9px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  z-index: 100;
  gap: 0px;
  border: 2px solid rgb(68, 203, 236);
  border-top-right-radius: 8px;
  border-bottom-left-radius: 8px;
}
.message span {
  font-size: 22px;
  color: rgb(240, 18, 18);
  font-weight: 400;
}
.message i {
  cursor: pointer;
  color: rgb(3, 227, 235);
  font-size: 15px;
}
    </style>
</head>

<body>
    <?php include 'index_header.php' ?>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
        <div class="message" id= "messages"><span>' . $message . '</span>
        </div>
        ';
        }
    }
    ?>
    <section class="home" id="index">
        <div class="content">
            <h2>Fb4.0 <span> Xin chào bạn</span></h2>
            <h4>Website support chatgpt 4.0</h4>
            <p>Trang web có kho tài liệu đề thi khổng lồ để cho học sinh rèn luyện và có hỗ trợ chatgpt để giải đáp thắc mắc của học sinh. Đặc biệt là có những khóa học free trực tuyến giúp cho học sinh dễ hiểu hơn. </p>
            <div class="btn-group">
                <a href="chatgpt.html">Chat gpt</a>
                <a href="#">Xem thêm</a>
            </div>
            <div class="social-icons">
                <a href="https://www.instagram.com/viboee0606/"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="https://www.facebook.com/sup2k3/"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
            </div>
        </div>
    </section>
    <section>
      <div class="container">
        <div class="jum">
            <div class="tieude">
                Miễn phí hàng trăm ngàn tài liệu giáo dục - học tập
            </div>
            <span class="test" >
                Bạn là giáo viên, học sinh hay phụ huynh? Bạn muốn nâng cao kiến thức tiếng Anh? Trang Web có thể đáp ứng bạn:
            </span>
            <ul class="list">
                <li>
                    <a href="" title="Trắc nghiệm">
                        <span class="list_img"><img src="images/tracnghiem.svg" alt=""></span>
                        <span>Trắc nghiệm</span>
                        <span> Trắc nghiệm kiến thức các môn học lớp 12, trắc nghiệm EQ, IQ miễn phí </span>
                    </a>
                </li>
                <li>
                    <a href="" title="Đề thi">
                        <span class="list_img"><img src="images/dethi.svg" alt=""></span>
                        <span>Đề thi</span>
                        <span>  Đề thi học kì 1, đề thi học kì 2, đề kiểm tra 15 phút, 1 tiết học kì kèm đáp án </span>
                    </a>
                </li>
                <li>
                    <a href="" title="Sách tham khảo">
                        <span class="list_img"><img src="images/sach.svg" alt=""></span>
                        <span>Sách tham khảo</span>
                        <span>  Giáo án - bài giảng các môn 12 lớp được soạn theo chuẩn của Bộ GD&ĐT  </span>
                    </a>
                </li>
                <li>
                    <a href="" title="chatgpt">
                        <span class="list_img"><img src="images/chatgpt.svg" alt=""></span>
                        <span> Giải đáp</span>
                        <span> Có khả năng xử lý những thắc mắc mà trong quá trình học tập bạn chưa hiểu </span>
                    </a>
                </li>
            </ul>
        </div>
      </div>
    </section>
    <section id="Magical">
        <div class="container px-5 mx-auto">
            <h2 class="text-gray-400 m-8 font-extrabold text-4xl text-center border-t-2 text-red-800"style="color: rgb(0, 167, 245);">
                Sách Thịnh Hành
            </h2>
        </div>
    </section>
    <section class="show-products">
        <div class="box-container">

            <?php
            $select_book = mysqli_query($conn, "SELECT * FROM `book_info` where category='hotbook'") or die('query failed');
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
            ?>

                    <div class="box" style="width: 255px; height:365px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                            echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 195px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">

                            <div style="font-weight: 500; font-size:18px; text-align: center; " class="name"> <?php echo $fetch_book['name']; ?></div>
                        </div>
                        <div class="price">Giá tài liệu chỉ: <strong style="color: red ;"><?php echo $fetch_book['price']; ?> VNĐ </strong> </div>
                        <div class="note">
                         <span class="bag">KM</span>
                         <lable style="font-size: 14px;">Thẻ VIP giúp bạn có nhiều ưu đãi hơn...</lable>
                         <strong class="text_orange">VÀ 12 tiện ích khác</strong>
                     </div>
                        <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_id" value="<?php echo $fetch_book['bid'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                            <button onclick="myFunction()" name="add_to_cart"><i class='bx bx-cart-download' style="font-size: 30px;"></i>
                                <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                                    echo '-name=', $fetch_book['name']; ?>" class="update_btn">Xem chi tiết</a>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">chưa có sản phẩm nào được thêm vào!</p>';
            }
            ?>
        </div>
    </section>   
    <section>
        <center><a href="all_book.php"><h2 style="margin: 20px 0px;" >Xem tất cả sách....</h2></a></center>
    </section>
    <section id="Magical">
        <div class="container px-5 mx-auto">
            <h2 class="text-gray-400 m-8 font-extrabold text-4xl text-center border-t-2 text-red-800"style="color: rgb(0, 167, 245);">
                Sách khối A
            </h2>
        </div>
    </section>
    <section class="show-products">
        <div class="box-container">

            <?php
            $select_book = mysqli_query($conn, "SELECT * FROM `book_info` where category='khoia'") or die('query failed');
            if (mysqli_num_rows($select_book) > 0) {
                while ($fetch_book = mysqli_fetch_assoc($select_book)) {
            ?>

                    <div class="box" style="width: 255px; height:365px;">
                        <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                            echo '-name=', $fetch_book['name']; ?>"> <img style="height: 200px;width: 195px;margin: auto;" class="books_images" src="added_books/<?php echo $fetch_book['image']; ?>" alt=""></a>
                        <div style="text-align:left ;">

                            <div style="font-weight: 500; font-size:18px; text-align: center; " class="name"> <?php echo $fetch_book['name']; ?></div>
                        </div>
                        <div class="price">Giá tài liệu chỉ: <strong style="color: red ;"><?php echo $fetch_book['price']; ?> VNĐ </strong> </div>
                        <div class="note">
                         <span class="bag">KM</span>
                         <lable style="font-size: 14px;">Thẻ VIP giúp bạn có nhiều ưu đãi hơn...</lable>
                         <strong class="text_orange">VÀ 12 tiện ích khác</strong>
                     </div>
                        <!-- <button name="add_cart"><img src="./images/cart2.png" alt=""></button> -->
                        <form action="" method="POST">
                            <input class="hidden_input" type="hidden" name="book_name" value="<?php echo $fetch_book['name'] ?>">
                            <input class="hidden_input" type="hidden" name="book_id" value="<?php echo $fetch_book['bid'] ?>">
                            <input class="hidden_input" type="hidden" name="book_image" value="<?php echo $fetch_book['image'] ?>">
                            <input class="hidden_input" type="hidden" name="book_price" value="<?php echo $fetch_book['price'] ?>">
                            <button onclick="myFunction()" name="add_to_cart"><i class='bx bx-cart-download' style="font-size: 30px;"></i>
                                <a href="book_details.php?details=<?php echo $fetch_book['bid'];
                                                                    echo '-name=', $fetch_book['name']; ?>" class="update_btn">Xem chi tiết</a>
                        </form>
                        <!-- <button name="add_to_cart" ><img src="./images/cart2.png" alt="Add to cart"></button> -->
                        <!-- <input type="submit" name="add_cart" value="cart"> -->
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">chưa có sản phẩm nào được thêm vào!</p>';
            }
            ?>
        </div>
    </section>  
    <section>
        <center><a href="all_book.php"><h2 style="margin: 20px 0px;" >Xem tất cả sách....</h2></a></center>
    </section>
    <?php include 'index_footer.php'; ?>

    <script>
        setTimeout(() => {
            const box = document.getElementById('messages');

            // 👇️ hides element (still takes up space on page)
            box.style.display = 'none';
        }, 8000);
    </script>


</body>

</html>