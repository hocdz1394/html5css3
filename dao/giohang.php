<?php
function cart_insert($id_pro, $price, $name, $img, $quantity, $thanhtien, $id_bill){
    $sql = "INSERT INTO cart(price,name,img,quantity,thanhtien,id_bill) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $id_pro, $price, $name, $img, $quantity, $thanhtien, $id_bill);
}
function get_tongdonhang(){
    $tong = 0; // Khởi tạo $tong là một số nguyên 0
    foreach ($_SESSION["giohang"] as $sp) 
        extract($sp);
        $gia_thuc = (int)$price * (int)$quantity; 
        $tong += $gia_thuc;
    return $tong;
}