<style>
  td {
    padding: 0 20px;
  }
</style>
<main class="catalog  mb ">
  <?php
  extract($sp);
  ?>

  <div class="boxleft">
    <div class="  mb">
      <div class="box_title">
        <?= $name ?>
      </div>
      <div class="box_content">
        <?php
        $link = $img_path . $img;
        echo '<img src="' . $link . '" width="300px">';
        echo '<p>' . $mota . '</p>';
        ?>
      </div>
    </div>

    <div class="mb">
      <div class="box_title">BÌNH LUẬN</div>
      <div class="box_content2  product_portfolio binhluan ">
        <table>
          <?php
          foreach ($cmt as $value) {
            extract($value);
            echo '<tr>
            <td>' . $noidung . '</td>
            <td>' . $user . '</td>
            <td>' . date("d-m-Y", strtotime($ngaybinhluan)) . '</td>
          </tr>';
          }


          ?>
        </table>
      </div>
      <div class="box_search">
        <form action="index.php?act=sanphamct$idsp=<?= $id ?>" method="POST">
          <input type="hidden" name="idpro" value="<?= $id ?>">
          <input type="text" name="noidung">
          <input type="submit" name="guibinhluan" value="Gửi bình luận">
        </form>
      </div>

    </div>

    <div class=" mb">
      <div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
      <div class="box_content">
        <?php
        foreach ($sp_cungloai as $sp_cl) {
          extract($sp_cl);
          $link = "index.php?act=sanphamct&idsp=" . $id;
          echo '<li><a href="' . $link . '">' . $name . '</a></li>';
        }
        ?>
      </div>
    </div>
  </div>
  <?php
  include "view/boxright.php";
  ?>

</main>