<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "global.php";
include "model/binhluan.php";
include "model/taikhoan.php";
$listdm = loadAll_dm_home();
include "view/header.php";
$spnew = loadAll_sp_home();
$dstop10 = loadAll_sp_top10();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "sanphamct":
            if (isset($_POST['guibinhluan'])) {
                insert_cmt($_POST['idpro'], $_POST['noidung']);
            }

            if (isset($_GET['idsp']) && $_GET['idsp'] > 0) {
                $sp = load_one_sp($_GET['idsp']);
                $sp_cungloai = load_sp_cungloai($_GET['idsp'], $sp['iddm']);
                $cmt = load_cmt($_GET['idsp']);
                include "view/chitietsanpham.php";
            }

            break;

        case "sanpham":
            if (isset($_POST['smb']) && $_POST['smb']) {
                $timkiem = $_POST['timkiem'];
            } else {
                $timkiem = "";
            }

            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = "";
            }
            $dssp = load_list_sp($timkiem, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;

        case "dangky";
            if (isset($_POST['dangky']) && $_POST['dangky']) {
                $email = $_POST['email'];
                $name = $_POST['user'];
                $pass = $_POST['pass'];
                insert_tk($email, $name, $pass);
                $thongbao = "Bạn đã đăng kí thành công !";
            }
            include "view/taikhoan/dangki.php";
            break;

        case "dangnhap";
            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $name = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = check_user($name, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location:index.php');
                    // $thongbao = "Bạn đã đăng nhập thành công !";
                } else {
                    $thongbao = "Tài khoản không tồn tại hoặc chưa đăng kí !";
                }
            }
            include "view/taikhoan/dangki.php";
            break;

        case "edit_tk";
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $address = $_POST['adress'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];
                $email = $_POST['email'];
                update_tk($id,$user, $pass, $email,$address,$tel);
                $_SESSION['user'] = check_user($user, $pass);
                header('location:index.php?act=edit_tk');
            }
           
            include "view/taikhoan/edit_tk.php";
            break;

            case "quenmk";
            if (isset($_POST['gui']) && $_POST['gui']) {
                $email = $_POST['email'];
                $check=check_email($email);
                if (is_array($check)) {
                    $thongbao = "Mật khẩu của bạn là:".$check['pass'];
                } else {
                    $thongbao = "Email này không tồn tại !";
                }
               
            }
            include "view/taikhoan/quenmk.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
