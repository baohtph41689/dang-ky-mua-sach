<?php
function load_cmt($idsp){
    $sql="SELECT binhluan.noidung,binhluan.ngaybinhluan,taikhoan.user FROM `binhluan`
    JOIN taikhoan on binhluan.iduser=taikhoan.id
    JOIN sanpham on binhluan.idpro=sanpham.id
    WHERE sanpham.id=$idsp";
    $result=pdo_query($sql);
    return $result;
}


function insert_cmt($idpro, $noidung){
    $date = date('Y-m-d');
    $sql = "
        INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
        VALUES ('$noidung','2','$idpro','$date');
    ";
    //echo $sql;
    //die;
    pdo_execute($sql);
}

?>