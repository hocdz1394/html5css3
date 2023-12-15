<?php
require_once 'pdo.php';

// function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
// }

// function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ma_loai=?,dac_biet=?,so_luot_xem=?,ngay_nhap=?,mo_ta=? WHERE ma_hh=?";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta, $ma_hh);
// }

// function hang_hoa_delete($ma_hh){
//     $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }

function get_new_featured($limi){
    $sql = "SELECT * FROM product WHERE featured=1 ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
function db_sphot($limi){
    $sql = "SELECT * FROM product WHERE hot=1 ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
function dssp_list($limi){
    $sql = "SELECT * FROM product ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
function db_spnew($limi){
    $sql = "SELECT * FROM product WHERE new=1 ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}

// function get_dssp($iddm,$limi){
//     $sql = "SELECT * FROM sanpham WHERE 1";
//     if($iddm>0){
//         $sql .=" AND iddm=".$iddm;
//     }
//     $sql .= " ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }

function db_spct($id){
    $sql = "SELECT * FROM product WHERE id=?";
    return pdo_query_one($sql, $id);
}
function db_splq($limi,$id,$idcatalog){
    $sql = "SELECT * FROM product WHERE idcatalog=? AND id<>? ORDER BY id DESC LIMIT ".$limi;
    return pdo_query($sql,$idcatalog,$id); 
}
// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }


function show_spnb($featured_product){
    $html_featuredpro = '';
    foreach ($featured_product as $item) {
        extract($item);
        $linkpdetail = 'index.php?pg=productdetail&idproduct=' . $id;
        if ($img != "")
            $img = PATH_IMG . $img;
            $html_featuredpro.= '
            <div class="highlight">
                <a href="' . $linkpdetail . '"><img src="' . $img . '" alt="" class="hl-img"></a>
                <div class="hl-name">' . $name . '</div>
                <div class="addtocart">
                    <div class="hl-price">' . number_format($price, 0, ",", ".") . ' ₫</div>
                    <form action="index.php?pg=addcart" method="POST"> 
                        <input type="hidden" name="id" value="' . $id . '">
                        <input type="hidden" name="id_pro" value="'.$id_pro.'">
                        <input type="hidden" name="img" value="' . $img . '">
                        <input type="hidden" name="name" value="' . $name . '">
                        <input type="hidden" name="price" value="' . $price . '">
                        <input type="hidden" name="quantity" value="1">
                        <input type="submit" name="btnaddtocart" id="atcs" value="Đặt hàng">
                    </form>
                </div>
                <div class="assess">
                    <div class="start-icon">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                    <a href=""><div class="heath-icon"><ion-icon name="heart-circle-outline"></ion-icon></div></a>
                </div>
            </div>
            ';
    }
    return $html_featuredpro;
}
function show_sphot($hot_sp){
    $html_sphot = '';
    foreach ($hot_sp as $sphot) {
        if($hot>=0){
        $tag='<div class="secfisrt-pro-item-tag">
                <div class="secfisrt-pro-item-tag1"></div>
                <div class="secfisrt-pro-item-tag2"></div>
                <div class="secfisrt-pro-item-tag3">Giảm 70%</div>
            </div>';
        }
        else{
            $tag='';
        }
        extract($sphot);
        $link_sphot= "index.php?pg=productdetail&idproduct=".$id."";
        $html_sphot.='
            <form action="index.php?pg=addcart" method="post" >
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="id_pro" value="'.$id_pro.'">
                <input type="hidden" name="img" value="' . $img . '">
                <input type="hidden" name="name" value="' . $name . '">
                <input type="hidden" name="price" value="' . $price . '">
                <input type="hidden" name="quantity" value="1">
            </form>
            <div class="secfisrt-pro-item">
                '.$tag.'
                <div class="secfisrt-pro-sp">
                    <div class="secfisrt-pro-spbg">
                        <a href="'.$link_sphot.'">
                            <img src="http://localhost/project/uploads/'.$img.'"/>
                        </a>
                        <div class="secfisrt-pro-spbg-name">'.$name.'</div>
                        <div class="secfisrt-pro-spbg-price" >
                            <div class="secfisrt-pro-spbg-price1" >1.900,000đ</div>
                            <div class="secfisrt-pro-spbg-price2" >' . number_format($price, 0, ",", ".") . 'đ</div>
                        </div>
                        <div class="secfisrt-pro-spbg-fr">
                            <div class="secfisrt-pro-spbg-ionsp"><ion-icon name="heart-outline"></ion-icon></div>
                            <div class="secfisrt-pro-spbg-ionfr">Yêu thích</div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
    return $html_sphot;
}
function show_spnew($new_product){
$html_spnew = '';
        foreach ($new_product as $item) {
    if ($new >= 0) {
        $newlable = '<a href="#"><div class="new">new</div></a>';
    } else {
        $newlable = "";
    }
    extract($item);
    $linkpdetail = "index.php?pg=productdetail&idproduct=" . $id;
    if ($img != "")
        $img = PATH_IMG . $img;
        $html_spnew.= '
        <form action="index.php?pg=addcart" method="post" >
            <input type="hidden" name="id" value="'.$id.'">
            <input type="hidden" name="id_pro" value="'.$id_pro.'">
            <input type="hidden" name="img" value="'.$img.'">
            <input type="hidden" name="name" value="'.$name.'">
            <input type="hidden" name="price" value="'.$price.'">
            <input type="hidden" name="quantity" value="1">
            <div class="bd-product">
                <a href="' . $linkpdetail . '" class="a">
                    <img src="' . $img . '"  alt="">
                    ' . $newlable . '
                    <h4>' . $name . '</h4>
                    <p>' . number_format($price, 0, ",", ".") . 'đ</p> 
                </a>
                <input name="btnaddtocart" value="Thêm giỏ hàng" type="submit" class="atc trans">
            </div>
        </form> ';
    }
    return $html_spnew;
}
//Html của phần sản phần sản phẩm liên quam
function show_splq($splq){
    $html_splq = '';
    foreach ($splq as $item) {
        extract($item);
        $linkpdetail = "index.php?pg=productdetail&idproduct=" . $id;
        $html_splq.= '
        <form action="index.php?pg=addcart" method="post" >
            <input type="hidden" name="id" value="' . $id . '">
            <input type="hidden" name="id_pro" value="'.$id_pro.'">
            <input type="hidden" name="img" value="' . $img . '">
            <input type="hidden" name="name" value="' . $name . '">
            <input type="hidden" name="price" value="' . $price . '">
            <input type="hidden" name="quantity" value="1">
            <div class="bd-product">
                <a href="' . $linkpdetail . '" class="a">
                <img src="http://localhost/project/uploads/'.$img.'" alt="">
                    ' . $newlable . '
                    <h4>' . $name . '</h4>
                    <p>' . number_format($price, 0, ",", ".") . 'đ</p> 
                </a>
            </div>
        </form> 
        ';
    }
    return $html_splq;
}

//admin
function showsp_admin($sanpham_list){
    $html_showsp = '';
    foreach ($sanpham_list as $item) {
        extract($item);
        $edit = "<a href='index.php?pg=updatesp&id_sp=" . $id_sp . "' class='btn btn-primary'>Sửa</a>";
    
        $del = "<a href='index.php?pg=delsp&id_sp=" . $id_sp . "' class='btn btn-danger'>Xóa</a>";
    
        $html_showsp.= '
        <tr >
            <td >' . $id . '</td>
            <td><img class ="w-25" src="../uploads/' . $img . '" alt="Sản phẩm"></td>
            <td>' . $idcatalog . '</td>
            <td>' . $name . '</td>
            <td>' . $pice . '</td>
            <td>' . $view . '</td>
            <td class="d-flex gap-2">
                ' . $edit . $del . '
            </td>
        </tr>';
    }
    return $html_showsp;
}