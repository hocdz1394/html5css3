<?php
    if(isset($_SESSION["s_user"])&&($_SESSION["s_user"])>0){ 
        extract($_SESSION["s_user"]);
    }
    if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){ 
        extract($_SESSION['giohang']);
        $html_sporder="";
        foreach ($_SESSION['giohang'] as $sp) {
            extract($sp);
            $tto = $price * $quantity;
            $tqtt += $quantity;
            $tta += $tto;
            $linkdelcart = "index.php?pg=delcart&ind=" . $i;
            $html_sporder.='
                    <div class="tt">
                    <img src="'.$img.'">
                        <div class="mid-tt">
                            <div class="name-tt">'.$name.'</div>
                            <div class="btm-tt">
                                <input placeholder="1" value="'.$quantity.'" min="1" type="number">
                                <div class="price-number">'.number_format($price, 0, ",", ".").' đ</div>
                            </div>
                        </div>
                        <a href="#"><div class="icon-tt"><ion-icon name="close"></ion-icon></div></a>
                    </div>
            ';
            $i++;
        }
    }

?>
<div class="container">
            <div class="cart-top-wrap">
                <div class="bar-cart">
                    <div class="cart-bar-cart cart-top-item">
                        <ion-icon name="bag-handle"></ion-icon>
                    </div>
                    <div class="cart-bar-credit cart-top-item">
                        <ion-icon name="card"></ion-icon>
                    </div>
                    <div class="cart-bar-tick cart-top-item">
                        <ion-icon name="checkmark-circle"></ion-icon>
                    </div>
                </div>
            </div>
        </div>
        <section class="cart">
            <section class="cart-left col6">
            <form action="index.php?pg=dathang" method="POST">
                <h2 class="h2-cl">Địa chỉ giao hàng</h2>
                    <div class="pay-cart">
                        <input placeholder="Họ tên" name="name" type="text">
                        <input placeholder="Số điện thoại" name="phonenb" type="text">
                        <input placeholder="Địa chỉ" name="diachi" type="text">
                        <input placeholder="Email" name="email" type="text">
                    </div>
                    <div class="card-number">
                        <input type="text" name="ghichu" placeholder="Ghi chú">
                        <!-- Block thay đổi thông tin khi nhận hàng -->
                    </div><br>
                    <div id="hidden" class="hidden">
                        <h2  class="h2-cl hhcl">=>Thay đổi thông tin khi nhận hàng</h2><br>
                        <div id="hidden-childr" class="hidden-childr">
                            <div  class="pay-cart">
                                <input name="name_nguoinhan" placeholder="Họ tên" type="text">
                                <input name="sdt_nguoinhan" placeholder="Số điện thoại" type="text">
                            </div>
                            <div class="card-number">
                                <input name="diachi_nguoinhan"   placeholder="Địa chỉ" type="text"><br>
                                <input name="ghichu_nguoinhan" type="text" placeholder="Ghi chú">
                            </div><br>
                        </div>
                    </div><br><br>
                <h2 class="h2-cl">Hình thức thanh toán</h2>
                <br>
                <div class="pay-th">
                    <div class="pay-th-text">
                        <p>Mọi giao dịch đều được bảo mật và mã hóa. Thông tin thẻ tín dụng sẽ không bao giờ được lưu lại.</p>
                        <br>
                        <div class="httt">
                            <input name="pttt" value="1" type="radio"><p>Thanh toán bằng thẻ tín dụng  </p><img src="http://localhost/project/uploads/1.png" alt="">
                        </div>
                        <div class="httt">
                            <input name="pttt" value="2" type="radio"><p>Thanh toán bằng thẻ ATM</p>
                        </div>
                        <div class="httt">
                            <input name="pttt" value="3" type="radio"><p>Thanh toán bằng Momo </p><img class="momo" src="http://localhost/project/uploads/2.png" alt="">
                        </div>
                        <div class="httt">
                            <input name="pttt" value="4" type="radio"><p>Thanh toán khi nhận hàng</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="cart-right col3-5">
                    <h2>Tóm tắt đơn hàng</h2>
                    <div class="bill">
                        <?=$html_sporder?>
                        <div class="items">
                            <div class="text-item bold">Tổng cộng</div>
                            <div class="price-item"><?=$tqtt?> Sản phẩm</div>
                        </div>
                        <!-- voucher chỗ này -->
                        <div class="items">
                            <div class="text-item bold"> Thành tiền</div>
                            <div class="price-item impot bold"><?=number_format($tta,0,",",".")?>đ</div>
                        </div>
                    </div>
                    <input type="hidden" name="tto" value="<?=$price?>">
                    <input type="hidden" name="tta" value="<?=number_format($tta,0,",",".")?>">
                    <input class="tttt" type="submit" name="dathang" value="Thanh toán đơn hàng">
                </form>
            </section>

        </section> <br><br>
        <script>
            var hidden = document.getElementById("hidden");
            var hidden_childr = document.getElementById("hidden-childr");
            hidden.onclick = function(){
                if(hidden_childr.style.display === "none"){
                    hidden_childr.style.display = "block"
                }else{
                    hidden_childr.style.display = "none"
                }
                
            }
        </script>
        <link rel="stylesheet" href="view/layout/css/pay.css">