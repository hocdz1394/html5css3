<?php
require_once 'pdo.php';

function db_adduser($username, $password, $email){
    $sql = "INSERT INTO user(username, password, email) VALUES (?, ?, ?)";
    pdo_execute($sql, $username, $password, $email);
} 
function db_adduser2($username, $password, $name, $phonenb, $diachi, $email){
    $sql = "INSERT INTO user(username, password, name, phonenb, diachi, email) VALUES (?, ?, ?, ?, ?, ?)";
    return pdo_execute_id($sql, $username, $password, $name, $phonenb, $diachi, $email);
}

function db_check($username, $password){
    $sql = "SELECT * FROM user WHERE username=? and password=?";
    return pdo_query_one($sql, $username, $password);
}
function db_update($username,$password,$phonenb,$email,$diachi,$role,$id){
    $sql = "UPDATE user SET username=?,password=?,phonenb=?,email=?,diachi=?,role=? WHERE id=?";
    pdo_execute($sql,$username,$password,$phonenb,$email,$diachi,$role,$id);
}
function dbget_user($id){
    $sql = "SELECT * FROM user WHERE id=?";
    return pdo_query_one($sql, $id);
}
// function khach_hang_delete($ma_kh){
//     $sql = "DELETE FROM user  WHERE ma_kh=?";
//     if(is_array($ma_kh)){
//         foreach ($ma_kh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_kh);
//     }
// }

// function khach_hang_select_all(){
//     $sql = "SELECT * FROM user";
//     return pdo_query($sql);
// }

// function khach_hang_select_by_id($ma_kh){
//     $sql = "SELECT * FROM user WHERE ma_kh=?";
//     return pdo_query_one($sql, $ma_kh);
// }

// function khach_hang_exist($ma_kh){
//     $sql = "SELECT count(*) FROM user WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM user WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function khach_hang_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE user SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }