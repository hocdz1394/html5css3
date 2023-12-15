
        <main>
            <div class="login">
                <div class="container-login">
                    <div class="top-login">
                        <h1>Đăng ký</h1>
                        <p>Nhập thông tin của bạn để đăng nhập vào tài khoản của bạn</p>
                    </div>
                    <div class="mid">
                        <form action="index.php?pg=adduser" method="POST">
                            <input type="text" name="username" id="" placeholder="Tên đăng nhập">
                            <input type="password" name="password" placeholder="Nhập mật khẩu" >
                            <!-- <input type="password" name="repassword" placeholder="Nhập lại mật khẩu"> -->
                            <input type="email" name="email" placeholder="Nhập Email" >
                            <input type="submit" name="dangky" value="Đăng ký">
                            <p>Gặp sự cố khi đăng nhập?</p>
                            <div class="mid2">
                                <p>Hoặc đăng ký bằng</p>
                            </div>
                        </form>
                    </div>
                    <div class="socials">
                        <div class="social"><ion-icon name="logo-google"></ion-icon><span> Googgle</span></div>
                        <div class="social"><ion-icon name="logo-apple"></ion-icon><span> Apple ID</span></div>
                        <div class="social"><ion-icon name="logo-facebook"></ion-icon><span> Facebook</span></div>
                    </div>
                    <div class="bottom-login">
                        <span>Tôi đã có tài khoản?</span><a href="./account.html"><strong>Đăng nhập tại đây</strong></a>
                    </div>
                </div>
            </div>
        </main>
        <link rel="stylesheet" href="view/layout/css/register.css">
