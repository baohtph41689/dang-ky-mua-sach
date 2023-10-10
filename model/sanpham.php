<?php
//tren trang quan tri 
function insert_sp($tensp, $giasp, $img_name, $mota, $iddm)
{
    $sql = "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$img_name','$mota','$iddm')";
    pdo_execute($sql);
}


function load_list_sp($keyw, $iddm)
{
    $sql = "select * from sanpham where 1";
    if ($keyw != "") {
        $sql .= " AND name LIKE '%" . $keyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " AND iddm LIKE '%" . $iddm . "%'";
    }

    $sql .= " order by id desc";
    $listsp = pdo_query($sql);
    return $listsp;
}

function delete_sp($idsp)
{
    $sql = "delete from sanpham where id=" . $idsp;
    $result = pdo_execute($sql);
}


function update_sp($iddm, $tensp, $giasp, $img_name, $mota, $id)
{
    if ($img_name == "") {
        $sql = "update sanpham set name='$tensp',price='$giasp',mota='$mota',iddm='$iddm'  where id=$id";
    } else {
        $sql = "update sanpham set name='$tensp',price='$giasp',img='$img_name',mota='$mota',iddm='$iddm'  where id=$id";
    }
    pdo_execute($sql);
}




//giao diện 
//hiện 9 sản phẩm mới nhất  
function loadAll_sp_home()
{
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    //where = 1 để cho nó luôn đúng 
    $listsp = pdo_query($sql);
    return $listsp;
    //tra vef data de ti dua ra ben ngoai

}

//hien thi top 10 sp cos luot xem nhieu nhat 
function loadAll_sp_top10()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsp = pdo_query($sql);
    return $listsp;
}


function load_one_sp($id)
{
    $sql = "select * from sanpham where id = $id";
    $result = pdo_query_one($sql);
    return $result;
}

function load_sp_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}
