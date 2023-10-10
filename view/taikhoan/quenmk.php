<main class="catalog  mb ">
    <div class="boxleft">

        <div class="box_title">Đăng ký thành viên</div>
        <div class="box_content form_account">
            <form action="index.php?act=quenmk" method="post">
                <div>
                    <p>Email</p>
                    <input type="email" name="email" placeholder="email">
                </div>
                
                <input type="submit" value="Gửi" name="gui">

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