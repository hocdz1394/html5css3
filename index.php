
<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
  session_start();
  // ob_start();
  if(!isset($_SESSION["giohang"])){
    $_SESSION["giohang"]=[];
  }
  include("view/global.php");
  include_once("dao/pdo.php");
  include_once("dao/user.php");
  include_once("dao/giohang.php");
  include_once("dao/donhang.php");
  include_once("dao/danhmuc.php");
  include_once("dao/sanpham.php");
  //
  include_once("view/header.php");
    if(!isset($_GET['pg'])){
    $featured_product = get_new_featured(8);
    $hot_sp = db_sphot(5);
    $new_product=db_spnew(10);
    include_once("view/home.php");
  }else{
      $pg=$_GET['pg'];
      switch ($pg) {
          case 'product':
            $getcatalog=db_dmsp();
            if(isset($_GET['idcatalog'])){
              $idcatalog=$_GET['idcatalog'];
            }else{
              $idcatalog=0;
            }
            //check nó có tồn tại form tìm kiếm hay không
            if(isset($_POST["timkiem"])&&($_POST["timkiem"])){
              $keyw=$_POST["keyw"];
              $h1title="Kết quả tìm kiếm: ".$keyw;
            }else{
              $keyw="";
              $h1title="";
            }
            $getproduct=db_spdm($keyw,$idcatalog,12);
            include_once("view/product.php");
            break;
          case 'productdetail':
            if(isset($_GET['idproduct'])){
              $id=$_GET['idproduct'];
              $detail=db_spct($id);
              $idcatalog=$detail['idcatalog'];
              $splq=db_splq(4,$id,$idcatalog);
              include_once("view/productdetail.php");
            }else{
              include_once("view/home.php");
            }
            break;
          case 'delcart':
            if(isset($_GET['ind'])&&($_GET['ind']>=0)){
              if($img!="") $img=PATH_IMG.$img;
              array_splice($_SESSION['giohang'],$_GET['ind'],1);
              header("location: index.php?pg=viewcart"); 
            }
            break;
          case 'viewcart':
            $featured_product = get_new_featured(4);
            if(empty($_SESSION['giohang'])){
              unset($_SESSION['giohang']);
            }
            include_once("view/viewcart.php");
            break;
          case 'addcart':

              if (isset($_POST['btnaddtocart']) && ($_POST['btnaddtocart'])) {
                  $idpro = $_POST['idpro'];
                  $id = $_POST['id'];
                  $img = $_POST['img'];
                  $name = $_POST['name'];
                  $price = $_POST['price'];
                  $quantity = $_POST['quantity'];
                  $thanhtien = (int)$price * (int)$quantity;
                  $sp = ["id" => $id ,"id_pro" => $id_pro, "img" => $img, "name" => $name, "price" => $price, "quantity" => $quantity, "thanhtien" => $thanhtien];
                  array_push($_SESSION["giohang"],$sp);
                  
                  
                  header("location: index.php?pg=viewcart");
              }
            break;
          case 'login':
            //input 
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
              $username=$_POST['username'];
              $password=$_POST['password'];
              $kq = db_check($username, $password);
              //xử lý
              if(is_array($kq)&&(count($kq))){
                // nếu nó là mảng và có giá trị => đúng
                // nó là dữ liệu của 1 user khi đăng nhập
                $_SESSION['s_user']=$kq;
                header("location: index.php");
              }else{
                // nhập sai
                $tb = "Chưa có tài khoản đăng nhập hoặc sai thông tin đăng nhập ";
                $_SESSION['tbdangnhap']=$tb;
                header("location: index.php?pg=login");
              }
            }
            include("view/login.php");
            break;
          case 'adduser':
            if(isset($_POST['dangky'])&&($_POST['dangky'])){
              $username=$_POST['username'];
              $password=$_POST['password'];
              $email=$_POST['email'];
              db_adduser($username, $password, $email);
            }
            header("location: index.php?pg=login");
            break;
          case 'register':
            include_once("view/register.php");
            break;
          case 'myaccount':
            if(isset($_SESSION["s_user"])&&($_SESSION["s_user"])>0){
              include_once("view/myaccount.php");
            }
            break;
          case 'myaccount_confirm':
            include_once("view/myaccount_confirm.php");
            break;
          case 'update':
            if(isset($_POST["capnhat"])&&($_POST["capnhat"])){
              $username=$_POST['username'];
              $password=$_POST['password'];
              $phonenb=$_POST['phonenb'];
              $email=$_POST['email'];
              $diachi=$_POST['diachi'];
              $role= 0;
              $id=$_POST['id'];
              //xử lý
              db_update($username, $password, $phonenb, $email, $diachi, $role, $id);
              include_once("view/myaccount_confirm.php");
            }
            break;
          case 'logout':
            if(isset($_SESSION["s_user"])&&($_SESSION["s_user"])>0){
              //load vào trng logout có dữ liệu xoá => chạy ra trang chủ
              unset($_SESSION["s_user"]);
            }
            include_once("view/index.php");
            break;
          case 'order':
            include_once("view/order.php");
            break;
          case 'dathang_confirm':
            include_once("view/dathang_confirm.php");
            break;
          case 'dathang':
            
            if(isset($_POST["dathang"])&&($_POST["dathang"])){
              error_reporting(E_ALL);
              ini_set('display_errors', '1');
              $userod_name=$_POST['name'];
              $userod_tel=$_POST['phonenb'];
              $userod_adress=$_POST['diachi'];
              $userod_email=$_POST['email'];
              $ghichu=$_POST['ghichu'];
              $userece_name=$_POST['name_nguoinhan'];
              $userece_tel=$_POST['sdt_nguoinhan'];
              $userece_adress=$_POST['diachi_nguoinhan'];
              $userece_ghichu=$_POST['ghichu_nguoinhan'];
              $pttt=$_POST['pttt'];
              $total=get_tongdonhang();
              $voucher=0;
              $ship=0;

              $username="homedc".rand(1,999);//hàm random
              $password="123456";
              $total_payment=($total -$voucher) +$ship;//tổng tiền hàng
              $id_user=db_adduser2($username, $password, $name, $phonenb, $diachi, $email);
              //tạo đơn hàng
              $madh="Homedc".$id_user."-".date("His-dmY");
              $id_bill=bill_insert_id($madh, $id_user, $userod_name, $userod_email, $userod_tel, $userod_adress, $ghichu, $userece_name, $userece_tel, $userece_adress, $userece_ghichu, $total, $ship, $total_payment, $pttt);
              foreach ($_SESSION['giohang'] as $sp) {
                extract($sp);
                cart_insert($id, $price, $name, $img, $quantity, $thanhtien, $id_bill);
              }
              
              include_once("view/dathang_confirm.php");
            }
            include_once("view/dathang_confirm.php");
            break;
          default:
              include_once("view/home.php");
            break;
        }
      }
  include_once("view/footer.php");
?>










