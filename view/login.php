
        <main>
            <div class="login">
                <div class="container-login">
                    <div class="top-login">
                        <h1>Đăng nhập</h1>
                        <h3 style="color:red">
                        <?php
                            if(isset($_SESSION['tbdangnhap'])&&($_SESSION['tbdangnhap'])!=""){
                                echo $_SESSION['tbdangnhap'];
                                //in ra xong xoá luôn
                                unset($_SESSION['tbdangnhap']) ;
                            }
                        ?>
                        </h3>
                        <p>Nhập thông tin của bạn để đăng nhập vào tài khoản của bạn</p>
                    </div>
                    <form action="index.php?pg=login" method="post" >
                        <div class="mid">
                            <input name="username" type="text" placeholder="Nhập tài khoản" >
                            <input name="password" type="password" placeholder="Mật khẩu" >
                        </div>
                        <p>Gặp sự cố khi đăng nhập ?</p>
                        <div class="mid2">
                            <input type="submit" name="dangnhap" value="Đăng nhập">
                            <p>Hoặc đăng nhập bằng</p>
                        </div>
                    </form>
                    <div class="socials">
                        <a href="#"><div class="social"><ion-icon name="logo-google"></ion-icon><span> Googgle</span></div></a>
                        <a href="#"><div class="social"><ion-icon name="logo-apple"></ion-icon><span> Apple ID</span></div></a>
                        <a href="#"><div class="social"><ion-icon name="logo-facebook"></ion-icon><span> Facebook</span></div></a>
                    </div>
                    <div class="bottom-login">
                        <span>Tôi chưa có tài khoản?</span> <a href="./register.html"><strong> Đăng ký tại đây</strong></a>
                    </div>
                </div>
            </div>
        </main>
        <link rel="stylesheet" href="view/layout/css/account.css">