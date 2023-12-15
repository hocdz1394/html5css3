<?php
  session_start();
  ob_start();
  if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
    $img=$_POST['img'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $quantity=1;
  //tao mang
    $product=[
      'img'=>$img,
      'name'=>$name,
      'price'=>$price,
      'quantity'=>$quantity
    ];
    $_SESSION['giohang'][]=$product;
    header('location: cart.php');

  }
?>