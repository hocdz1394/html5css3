<?php
if(isset($_SESSION["s_user"])&&($_SESSION["s_user"])>0){ 
  extract($_SESSION["s_user"]);
}
?>
<br><br>
    <div class="containerrr">
      <div class="bar-category">
        <div class="user-logo"> <a href="./index.html">
         <img src="http://localhost/project/uploads/logo.png" alt=""></a></div>
        <div class="list-catgs">
          <div class="list-catg cur"><a href="./">
           <ion-icon name="person-circle-outline"></ion-icon>
           <p>Thông tin tài khoản</p></a>
          </div>
          <div class="list-catg"><a href="./history.html">
           <ion-icon name="time-outline"></ion-icon>
           <p>Lịch sử mua hàng</p></a>
          </div>
          <div class="list-catg"><a href="#">
           <ion-icon name="heart-circle-outline"></ion-icon>
           <p>Sản phẩm yêu thích</p></a>
          </div>
          <div class="list-catg"><a href="#">
           <ion-icon name="settings-outline"></ion-icon>
           <p>Cài đặt chỉnh sửa </p></a></div>
        </div>
      </div>
      <div class="bar-category-right">
        <div class="user-header">
          <h2>Tài khoản của tôi</h2>
          <div class="user-header-right">
            <img src="http://localhost/project/uploads/user.svg" alt="">
            <div class="user-header-right-name"><?=$username?></div>
          </div>
        </div>
        <div class="user-body">
          <div class="cover-photo"><img src="http://localhost/project/uploads/coverphoto.jpg" alt=""></div>
          <div class="cover-photot"></div>
          <div class="user-body-main">
            <div class="profile-left">
              <div class="profile-left-avatar">
                <img src="http://localhost/project/uploads/user.svg" alt="">
                <div class="profile-left-avatar-name"><?=$username?></div>
                <div class="profile-left-avatar-address">Fpoly-HCM</div>
              </div>
              <div class="profile-left-buttom">
               <a href="#"><div class="nut-profile" ></div></a>
               <input type="text" name="" id="">
              </div>
            </div>
            <div class="profile-rights">
            <!-- ---------------------------------------==0009899--- -->
            <form action="index.php?pg=update" method="POST">
              <div class="profile-right">
               <div class="profile-right-input"><p>Tên</p><input type="text"
                placeholder="Nhập tên" value="<?=$username?>" name="username" id="">
               </div>
               <div class="profile-right-input"><p>Mật khẩu</p>
               <input type="password" value="<?=$password?>" 
                placeholder="Nhập mật khẩu"  name="password" id="">
               </div>
              </div>
              <div class="profile-right-input ngaysinh "><p>Số điện thoại</p>
               <input class="wh" type="text" value="<?=$phonenb?>"
               placeholder="Nhập số điện thoại" name="phonenb" id="">
              </div>
              <div class="ngaysinh"><p>Email</p>
               <input type="email" placeholder="Nhập email" 
               value="<?=$email?>" name="email" id="">
              </div>
              <div class="ngaysinh"><p>Địa chỉ</p>
               <input type="text" placeholder="Nhập địa chỉ" value="<?=$diachi?>" name="diachi" id="">
              </div>
              <div class="profile-btn">
                <input type="hidden" name="id" value="<?=$id?>">
               <input class="update" type="submit" name="capnhat" value="Cập nhật">
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <link rel="stylesheet" href="view/layout/css/user.css">