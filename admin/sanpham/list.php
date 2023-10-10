<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI SẢN PHẨM</h1>
    </div>
    <div class="search">
    <form action="index.php?act=listsp" method="post">
                <input type="text" name="keyw">
                <select name="iddm" id="">
                    <option value="0" selected>tất cả</option>
                    <?php
                    foreach ($listdm as  $value) {
                        extract($value);
                        echo '  <option value="' . $id . '">' . $name . '</option>';
                    }

                    ?>i
                </select>
                <input type="submit" name="listok" value="GO">
            </form>
    </div>
    <form action="#" method="POST">
        <div class="row2 mb10 formds_loai">
            
            <div class="row2 form_content ">

                <table>
                    <tr>
                        <th></th>
                        <th>MÃ SP</th>
                        <th>TÊN SP</th>
                        <th>Hình SP</th>
                        <th>Giá SP</th>
                        <th style="width: 300px;">Mô tả sp</th>
                        <th>Lượt Xem</th>
                    </tr>

                    <?php
                    foreach ($listsp as  $value) {
                        extract($value);
                        $linkupdate = "index.php?act=suasanpham&idsp=" . $id;
                        $linkdelete = "index.php?act=xoasanpham&idsp=" . $id;
                        $imgpath = "../upload/" . $img;
                        if (is_file($imgpath)) {
                            $hinh = "<img src='" . $imgpath . "' height='150'> ";
                        }
                        echo ' <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>' . $id . '</td>
                <td>' . $name . '</td>
                <td>' . $hinh . '</td>
                <td>' . $price . '</td>
                <td>' . $mota . '</td>
                <td>' . $luotxem . '</td>
                <td>
                <a href="' . $linkupdate . '"><input type="button" value="Sửa"> </a>
                <a href="' . $linkdelete . '"><input type="button" value="Xóa"></a>
                 </td>
            </tr>';
                    }

                    ?>

                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="XÓA MỤC ĐÃ CHỌN">
                <a href="index.php?act=addsp"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
    </form>
</div>