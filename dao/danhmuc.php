<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $name_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
// function danhmuc_insert($name_danhmuc){
//     $sql = "INSERT INTO danhmuc(name_danhmuc) VALUES(?)";
//     pdo_execute($sql, $name_danhmuc);
// }
//admin
function get_danhmuc_id($id) {
    $sql = "SELECT * FROM catalog WHERE id = ?";
    return pdo_query_one($sql, $id);
}
function set_danhmuc($id, $name, $mo_ta){
    $sql = "UPDATE catalog SET name = ?, mo_ta = ? WHERE id = ?";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $mo_ta, $id]);
}

//admin
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $name_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function danhmuc_update($ma_danhmuc, $name_danhmuc){
//     $sql = "UPDATE danhmuc SET name_danhmuc=? WHERE ma_danhmuc=?";
//     pdo_execute($sql, $name_danhmuc, $ma_danhmuc);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
// function danhmuc_delete($ma_danhmuc){
//     $sql = "DELETE FROM danhmuc WHERE ma_danhmuc=?";
//     if(is_array($ma_danhmuc)){
//         foreach ($ma_danhmuc as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_danhmuc);
//     }
// }
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_all(){
    $sql = "SELECT * FROM catalog ORDER BY stt DESC ";
    return pdo_query($sql);
}
function db_dmsp(){
    $sql = "SELECT * FROM catalog ORDER BY id DESC ";
    return pdo_query($sql);
}
function db_spdm($keyw,$idcatalog,$limi){
    $sql = "SELECT * FROM product WHERE 1";
    if($idcatalog>0){
        $sql .=" AND idcatalog=".$idcatalog;
    }
    if($keyw!=""){
        $sql .=" AND name LIKE '%".$keyw."%'";
    }
    $sql .= " ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}
function delete_catalog($id) {
    $conn = pdo_get_connection();
    $dssp = get_products_by_catalog($id);    
    if (count($dssp) > 0) {
        return "Danh mục này hiện có " . count($dssp) . " sản phẩm và không thể xóa.";
    }
    $sql = "DELETE FROM catalog WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([$id])) {
        return "Xóa thành công";
    } else {
        return "Xóa thất bại";
    }
}
function get_products_by_catalog($id) {
    $sql = "SELECT * FROM product WHERE id = ?";
    return pdo_query($sql, $id);
}
function add_catalog($name,$mota){
    $sql = "INSERT INTO catalog (name, mo_ta) VALUES (?, ?)";
    pdo_execute ($sql,$name,$mota);
   };
   
   
// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_select_by_id($ma_danhmuc){
//     $sql = "SELECT * FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_one($sql, $ma_danhmuc);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }

function show_dmsp($getcatalog){
    $html_dmsp = "";
    foreach ($getcatalog as $item) {
        extract($item);
        $linkidcatalog="index.php?pg=product&idcatalog=".$id;
        if($img!="") $img=PATH_IMG.$img;
        $html_dmsp.= '
            <li class="list active">
                <a href="'.$linkidcatalog.'"><img class="icon" src="'.$img.'" alt="">
                    <span class="title">'.$name.'</span>
                </a>
            </li>
        ';
    }
    return $html_dmsp;
}
function show_spdm($getproduct){
    $html_spdm = "";
    foreach ($getproduct as $item) {
        if($new>0){
            $newlable='<a href="#"><div class="new">new</div></a>';
        }else{
            $newlable="";
        }
        extract($item);
        $linkpdetail="index.php?pg=productdetail&idproduct=".$id;
        if($img!="") $img=PATH_IMG.$img;
        $html_spdm.= '
        <form action="index.php?pg=addcart" method="post" >
            <input type="hidden" name="img" value="'.$img.'">
            <input type="hidden" name="name" value="'.$name.'">
            <input type="hidden" name="price" value="'.$price.'">
            <div class="bd-product">
                <a href="'.$linkpdetail.'" class="a">
                    <img src="'.$img.'"  alt="">
                    '.$newlable.'
                    <h4>'.$name.'</h4>
                    <p>'.number_format($price).'đ</p> 
                <a href="'.$linkpdetail.'">
                <input name="btnaddtocart" value="Thêm giỏ hàng" type="submit" class="atc trans">
            </div>
        </form> ';
        }
        return $html_spdm; 
}
//admin
// function showdm_admin($danhmuc_list){
//     $html_showdm = "";
//     foreach ($danhmuc_list as $item) {
//         extract($item);
//         $edit = "<a href='index.php?pg=updatedm&id_danhmuc=".$id."' class='btn btn-primary'>Sửa</a>";
    
//         $del="<a  href='index.php?pg=delcatalog&id_danhmuc=".$id ."' class='btn btn-danger'>Xóa</a>";
//         echo '
//         <tr>
//             <td>'.$id.'</td>
//             <td>'.$name.'</td>
//             <td>'.$mo_ta.'</td>
//             <td class="d-flex gap-2 ">
//             '.$edit.$del.'
//             </td>
//         </tr>
//         ';
//     }
//     return $html_showdm;
// }
function showdm_admin($danhmuc_list){
    $html_showdm = '';
foreach ($danhmuc_list as $item) {
    $id = $item['id'];
    $name = $item['name']; // Renamed to avoid overwriting $name

    $html_showdm .= '<option value="' . $id. '">' . $name . '</option>';
}
    return $html_showdm;
}