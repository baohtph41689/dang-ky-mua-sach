<?php
if (is_array($result)) {
    extract($result);
    $namesp = $name;
    $idsp=$id;
}
$imgpath = "../upload/" . $img;
if (is_file($imgpath)) {
    $hinh = "<img src='" . $imgpath . "' height='80'> ";
}

?>


<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT SẢN PHẨM </h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatesanpham" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label> Danh mục sản phẩm </label> <br>

                <select name="iddm">
                    <?php
                    foreach ($listdm as  $value) {
                        extract($value);
                        if ($iddm == $id) {
                            echo '  <option value="' . $id . '" selected>' . $name . '</option>';
                        } else {
                            echo '  <option value="' . $id . '">' . $name . '</option>';
                        }
                    }

                    ?>

                </select>
            </div>
            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <input type="text" name="tensp" value="<?= $namesp ?>">
            </div>

            <div class="row2 mb10">
                <label>giá sản phẩm </label> <br>
                <input type="text" name="giasp" value="<?= $price ?>">
            </div>

            <div class="row2 mb10">
                <label>Ảnh </label> <br>
                <?= $hinh ?>
                <input type="file" name="img" value="<?= $hinh ?>">
            </div>

            <div class="row2 mb10">
                <label>Mô tả </label> <br>
                <textarea name="mota" id="" cols="30" rows="10"><?= $mota ?></textarea>
            </div>

            <div class="row mb10 ">
                <input type="hidden" name="idsp" value="<?php if (isset( $idsp) &&  $idsp > 0) echo $idsp ?>">
                <input class="mr20" type="submit" name="capnhat" value="cập nhật">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
        </form>
        <?php
        if (isset($thongbao) && ($thongbao) != "") {
            echo $thongbao;
        }
        ?>
    </div>
</div>

<!-- END HEADER -->


</div>