<main class="catalog  mb ">

    <div class="boxleft">
    <div class="box_title_sp">
        <p>  <?=$tendm?></p>
     
      </div>
        <div class="items">
            <?php
            $i = 0;
            foreach ($dssp as  $sp) {
                extract($sp);
                $image = $img_path . $img;
                $link = "index.php?act=sanphamct&idsp=" . $id;
                if ($i == 2 || $i == 5 || $i == 8) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                echo '<div class="box_items ' . $mr . '">
            <div class="box_items_img">
               <img src="' . $image . '" alt="">
               <div class="add" href="">ADD TO CART</div>
            </div>
            <a class="item_name" href="' . $link . '">' . $name . '</a>
            <p class="price">$' . $price . '</p>
         </div>';
            }

            ?>
        </div>
    </div>
    <?php
    include_once "view/boxright.php";
    ?>

</main>
<!-- BANNER 2 -->