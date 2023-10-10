<?php
//tren trang quan tri 
function insertdm($tenloai){
    $sql = "insert into danhmuc(name) values('$tenloai')";
    pdo_execute($sql);
}


function load_list_dm(){
    $sql = "SELECT * FROM danhmuc order by id desc ";
            $listdm = pdo_query($sql);
            return $listdm;
}

function delete_dm($id){
    $sql = "delete from danhmuc where id=".$id;
    $result = pdo_execute($sql);
}

function load_one_dm($iddm){
    $sql = "SELECT * FROM danhmuc where id=" .$iddm;
    $danhmuc = pdo_query_one($sql);
    return $danhmuc;
}

function update_dm($tenloai,$id){
    $sql = "update danhmuc set name='$tenloai'where id=$id";
    pdo_execute($sql);
}



//tren giao dien 
function loadAll_dm_home(){
    $sql="select * from danhmuc order by id desc";
    $listdm=pdo_query($sql);
    return $listdm;
}

function load_ten_dm($iddm){
    if ($iddm>0) {
        $sql="select * from danhmuc where id=".$iddm;
        $dm=pdo_query_one($sql);
        extract($dm);
        return $name;
    }else {
        return "";
    }
  
}


?>