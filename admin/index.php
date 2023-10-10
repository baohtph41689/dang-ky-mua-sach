<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "header.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {

        case "adddm":
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenloai = $_POST['tenloai'];
                insertdm($tenloai);
                $thongbao = "them thanh cong !";
            }
            include "danhmuc/add.php";
            break;
            //
        case "listdm":
            $listdm = load_list_dm();
            include "danhmuc/list.php";
            break;
            //
        case "xoadanhmuc":
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                delete_dm($_GET['iddm']);
            }
            $listdm = load_list_dm();
            include "danhmuc/list.php";
            break;
            //
        case "suadanhmuc":
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $danhmuc = load_one_dm($_GET['iddm']);
            }
            include "danhmuc/update.php";
            break;
            //

        case "updatedanhmuc":
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_dm($tenloai, $id);
                $thongbao = "cap nhat thanh cong !";
            }
            $listdm = load_list_dm();
            include "danhmuc/list.php";
            break;

            // case sảnn phẩm 

        case "addsp":
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $img_name = $_FILES['img']['name'];
                $tmp_img = $_FILES['img']['tmp_name'];
                move_uploaded_file($tmp_img, "../upload/" . $img_name);

                insert_sp($tensp, $giasp, $img_name, $mota, $iddm);
                $thongbao = "them thanh cong !";
            }
            $listdm = load_list_dm();
            include "sanpham/add.php";
            break;
            //
        case "listsp":
            if (isset($_POST['listok']) && $_POST['listok']) {
                $keyw = $_POST['keyw'];
                $iddm = $_POST['iddm'];
            } else {
                $keyw = "";
                $iddm = 0;
            }
            $listdm = load_list_dm();
            $listsp = load_list_sp($keyw, $iddm);
            include "sanpham/list.php";
            break;
            //
        case "xoasanpham":
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                delete_sp($_GET['idsp']);
            }
            $listsp = load_list_sp("", 0);
            include "sanpham/list.php";
            break;
            //
        case "suasanpham":
            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $result = load_one_sp($_GET['idsp']);
            }
            $listdm = load_list_dm();
            include "sanpham/update.php";
            break;
            //

        case "updatesanpham":
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $id = $_POST['idsp'];
                $img_name = $_FILES['img']['name'];
                $tmp_img = $_FILES['img']['tmp_name'];
                move_uploaded_file($tmp_img, "../upload/" . $img_name);
                update_sp($iddm, $tensp, $giasp, $img_name, $mota, $id);
                $thongbao = "cap nhat thanh cong !";
            }
            $listdm = load_list_dm();
            $listsp = load_list_sp("", 0);
            include "sanpham/list.php";
            break;


        case "bieudo":
            include "bieudo.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
