<section class="products section container">
<main class="main">
    <section class="breadcrumb">
        <h3 style="padding-left:10px">SẢN PHẨM <strong style="text-transform: uppercase"><?= $tendm; ?></strong></h3>
    </section><br>
    <div class=" tab__items">
        <div class="tab__item active-tab">
            <div class="products__container grid">
                <?php
                // echo "<pre>";
                // print_r($dssp);
                // die;
                foreach ($products as $pro) {
                    extract($pro);
                    $linkPro = "index.php?act=details&idpro=" . $id_san_pham;
                    $variant_price = loadPriceVariant($id_san_pham);
                    $gia = $variant_price['gia'];
                    $giam_gia = $variant_price['giam_gia'];
                    echo '<div class="product__item">
                    <div class="product__banner">
                        <a href="' . $linkPro . '" class="product__imgaes">
                        <!-- ẢNH CHÍNH -->
                        <img src="./uploads/' . $hinh_anh . '" alt="" class="product__img defaule">
                        </a>

                        <!-- SALE/HOT -->
                        <div class="product__badge light-pink">' . (empty ($giam_gia) ? "Hot" : "-" . $giam_gia . "%") . '</div>
                    </div>

                    <div class="product_content">
                        <span class="product__category">Clothing</span>
                        <a href="' . $linkPro . '">
                        <h3 class="product__title">' . $ten_san_pham . '</h3>
                        </a>
                        
                        <div class="product__price flex">
                        <span class="new__price">$' . ($giam_gia == 0 ? $gia : $gia * ((100 - $giam_gia) / 100)) . '</span>
                        <span class="old__price">' . (empty ($giam_gia) ? "" : $gia) . '</span>
                    </div>
                    

                        <!-- THÊM VÀO GIỎ -->
                        <a href="#" class="action__btn cart__btn" aria-lable="Thêm vào giỏ hàng">
                        <i class="fa-solid fa-shop"></i>
                        </a>
                    </div>
                    </div>';
                }
                ?>

            </div>
        </div>
    </div>

</main>
</section>