<div class="boxright">

  <div class="mb">
    <div class="box_title">TÀI KHOẢN</div>
    <div class="box_content form_account">
      <?php
      if (isset($_SESSION['user'])and is_array($_SESSION['user'])) {
        extract($_SESSION['user']);
      ?>
        <form action="index.php?act=dangnhap" method="POST">
          <h4>Xin chào <?= $user ?> </h4><br>
          <li class="form_li"><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
          <li class="form_li"><a href="index.php?act=edit_tk">Cập nhật tài khoản</a></li>
          <li class="form_li"><a href="admin/index.php">Đăng nhập admin </a></li>
          <li class="form_li"><a href="index.php?act=logout">Thoát </a></li>
        </form>
      <?php
      } else {
      ?>
        <form action="index.php?act=dangnhap" method="POST">
          <h4>Tên đăng nhập</h4>
          <input type="text" name="user" id="">
          <h4>Mật khẩu</h4>
          <input type="password" name="pass" id="">
          <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
          <br><input type="submit" value="Đăng nhập" name="dangnhap">
          <li class="form_li"><a href="dangki.php?act=quenmk">Quên mật khẩu</a></li>
          <li class="form_li"><a href="index.php?act=dangky">Đăng kí thành viên</a></li>
        </form>

      <?php
      } ?>

    </div>
  </div>
  <div class="mb">
    <div class="box_title">DANH MỤC</div>
    <div class="box_content2 product_portfolio">
      <ul>
        <?php
        foreach ($listdm as $dm) {
          extract($dm);
          $link = "index.php?act=sanpham&iddm=" . $id;
          echo ' <li><a href="' . $link . '">' . $name . '</a></li>';
        }
        ?>
      </ul>
    </div>
    <div class="box_search">
      <form action="index.php?act=sanpham" method="POST">
        <input type="text" name="timkiem" id="" placeholder="Từ khóa tìm kiếm">
        <input type="submit" name="smb" value="Tìm Kiếm">
      </form>
    </div>
  </div>
  <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
  <div class="mb">
    <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
    <div class="box_content">

      <?php
      foreach ($dstop10 as $sptop10) {
        extract($sptop10);
        $link = "index.php?act=sanphamct&idsp=" . $id;
        $imgtop10 = $img_path . $img;
        echo ' <div class="selling_products" style="width:100%;">
                  <img src="' . $imgtop10 . '" alt="anh">
                  <a href="' . $link . '">' . $name . '</a>
                </div>';
      }

      ?>
    </div>
  </div>
</div>