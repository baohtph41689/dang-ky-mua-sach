<main class="catalog  mb ">
    <div class="boxleft">

        <div class="box_title">Cập Nhật Tài Khoản </div>
        <div class="box_content form_account">
            <form action="index.php?act=edit_tk" method="post">
                <?php
                if (isset($_SESSION['user']) and is_array($_SESSION['user'])) {
                    extract($_SESSION['user']);
                }


                ?>
                <input type="text" name="id" value="<?= $id ?>">
                <div>
                    <p>Email</p>
                    <input type="email" name="email" placeholder="email" value="<?= $email ?>">
                </div>
                <div>
                    <p>Tên đăng nhập</p>
                    <input type="text" name="user" placeholder="user" value="<?= $user ?>">
                </div>

                <div>
                    <p>Mật khẩu</p>
                    <input type="password" name="pass" placeholder="pass" value="<?= $pass ?>">
                </div>
                <div>
                    <p>Địa chỉ</p>
                    <input type="text" name="adress" placeholder="địa chỉ" value="<?= $address ?>">
                </div>
                <div>
                    <p>Số điện thoại</p>
                    <input type="text" name="tel" placeholder="số điện thoại " value="<?= $tel ?>">
                </div>

                <input type="submit" value="Cập Nhật" name="capnhat">
                <input type="reset" value="Nhập lại">
            </form><br>
            <h4 class="thongbao">
                <?php
                if (isset($thongbao) && ($thongbao) != "") {
                    echo $thongbao;
                }
                ?>
            </h4>

        </div>

    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>