<?php
$html_featuredpro=show_spnb($featured_product);
// xoá rỗng giỏ hàng
if(isset($_GET['indall'])&&($_GET['indall']==1)){
    unset($_SESSION['giohang']);
}

// in html đơn hàng
$html_cart="";
if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
    $i = 0;
    $tta = 0;
    $tqtt = 0;
    foreach ($_SESSION['giohang'] as $sp) {
        extract($sp);
        $tto = $price * $quantity;
        $tqtt += $quantity;
        $tta += $tto;
        $linkdelcart = "index.php?pg=delcart&ind=" . $i;
        $html_cart.= '
            <div class="sp">
                <img src="'.$img.'">       
                <div class="title-sp">
                    <div class="colum1-title">
                        <div class="name-title">'.$name.'</div>
                        <p>Giao trong vòng 3-5 ngày làm việc</p>
                        <div class="price-title" value="" >'.number_format($price, 0, ",", ".").' đ</div>
                    </div>
                    <div class="colum2-title">
                        <div class="quantity">
                            <form method="post" action="index.php?pg=addcart">
                                <input type="hidden" name="action" value="minus">
                                <button type="submit" name="submit" class="quantity-minus">-</button>
                            </form>
                                <input type="number" id="clickQuantity" class="quantity-number" value="'.$quantity.'" min="1" placeholder="1" >
                            <form method="post" action="index.php?pg=addcart">
                                <input type="hidden" name="action" value="plus">
                                <button type="submit" name="submit" class="quantity-plus">+</button>
                            </form>
                            </div>
                        <a class="icon-trash" href="'.$linkdelcart.'"><ion-icon name="trash"></ion-icon></a>
                    </div>
                    <input class="check-box" type="checkbox">
                </div>
            </div>
        ';
        $i++;

    }
}else{
    $emtycart="
    <div class='emtycart'>
      <img src='http://localhost/project/uploads/empty_cart.png'>
      <p>Giỏ hàng trống</p>
      <button><a href='index.php'>Tiếp tục mua sắm</a></button> hoặc <span>Xem sản phẩm gợi ý bên dưới</span>
    ";
}


?>
<link rel="stylesheet" href="view/layout/css/cart.css">
<main>
            <div class="container">
                <div class="cart-top-wrap">
                    <div class="bar-cart">
                        <div class="cart-bar-cart cart-top-list">
                            <ion-icon name="bag-handle"></ion-icon>
                        </div>
                        <div class="cart-bar-credit cart-top-list">
                            <ion-icon name="card"></ion-icon>
                        </div>
                        <div class="cart-bar-tick cart-top-list">
                            <ion-icon name="checkmark-circle"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
            <section class="cart">
                <section class="cart-left col6">
                    <div id="addOnSP" class="sps">
                    <?=$html_cart?>
                    <?=$emtycart?>

                        <!-- ------------------- -->
                    </div>
                </section>
                <section class="cart-right col3-5">
                    <h2 class="h2">Hoá đơn của bạn</h2>
                    <div class="bill">
                        <div class="lists">
                            <div class="text-list bold">Tổng tiền giỏ hàng</div>
                            <div class="price-list" id="subtotal"></div>
                        </div>
                        <div class="lists">
                            <div class="tax bold">Tổng sản phẩm</div>
                            <div class="price-list"><?=$tqtt?></div>
                        </div>
                        <div class="lists">
                            <div class="tax bold">Tổng tiền hàng</div>
                            <div class="price-list"><?=number_format($tta,0,",",".")?> đ</div>
                        </div>
                        <div class="lists">
                            <div class="text-list bold">Tạm tính</div>
                            <div class="price-list impot bold" id="tota"><?=number_format($tta,0,",",".")?>đ</div>
                        </div>
                        <a href="index.php?pg=order"><input type="button" value="Đặt hàng"></a>
                    </div>
                </section>
            </section>
            <div class="delall">
                <a href="index.php?pg=viewcart&indall=1"><button type="input" >Xoá rỗng giỏ hàng</button></a>
            </div>
            <h2 class="h22">Sản phẩm gợi ý</h2>
            <section class="similarr">
                <?= $html_featuredpro; ?>
            </section>
        </main><br><br>
    <link rel="stylesheet" href="view/layout/css/cart.css">
