<?php
    if(isset($_SESSION["s_user"])&&($_SESSION["s_user"])>0){
        extract($_SESSION["s_user"]);
        $html_account.='
            <span><a href="index.php?pg=myaccount">'.$username.'</a></span> | 
            <span><a href="index.php?pg=logout">Thoát</a></span>';
    }else{
        $html_account.='
            <span><a href="index.php?pg=register">Đăng ký</a></span> | 
            <span><a href="index.php?pg=login">Đăng nhập</a></span>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NQH::</title>
    <link rel="stylesheet" href="view/layout/css/home.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="welcome">Chào mừng bạn đến với không gian nội thất</div>
    <div class="container">
        <header>
            <div class="menu">
                <div class="logo col1"><a href="index.php"><img src="view/layout/img/logo.png" alt=""></a></div>
                <nav id="col5"  class="col5">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?pg=product">Sản phẩm</a></li>
                        <li><a href="index.php?pg=baiviet">Bài Viết</a></li>
                        <li><a href="index.php?pg=lienhe">Liên hệ</a></li>
                    </ul>
                </nav>
                <div class="search col2_5">
                    <form class="search-form" action="index.php?pg=product" method="post">
                        <input type="search" name="keyw" id="" placeholder="   search...">
                        <input class="find" type="submit" name="timkiem" value="Tìm kiếm">
                    </form>
                </div>
                <div class="directional-icon col2_5">
                    <a href="index.php?pg=viewcart"><ion-icon name="cart"></ion-icon></a>
                    <?=$html_account?>
                    <div class="number-cart"></div>
                </div>
            </div>
        </header> 