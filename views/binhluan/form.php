<?php
session_start();
include_once '../../models/binhluan.php';
include_once '../../models/pdo.php';

$idpro = $_REQUEST['idpro'];
$errNoi_dung = "";

$listbinhluan = loadAll_binhluan($idpro);

if(isset($_POST['guibinhluan']) && $_POST['guibinhluan']){
    $isCheck = true;
    $id_sanpham = $_POST['idpro'];
    $noi_dung = $_POST['noi_dung'];
    $trimp_noi_dung = trim($noi_dung);
    $id_nguoidung = isset($_SESSION['nguoidung']['id_nguoi_dung']) ? $_SESSION['nguoidung']['id_nguoi_dung'] : null;
    $ngay_binh_luan = date('Y-m-d');

    if(!$trimp_noi_dung){ 
        $isCheck = false;
        $errNoi_dung = "Bạn không được để trống bình luận";
        header("Location: ". $_SERVER['HTTP_REFERER']);
    }

    if($isCheck){
        insert_binhluan($noi_dung, $id_nguoidung, $id_sanpham, $ngay_binh_luan);
        header("Location: ". $_SERVER['HTTP_REFERER']);
        exit(); 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="detail__tabs">
        <span class="detail__tab active-tab">
            Bình luận
        </span>
    </div>

    <div class="details__tabs-content">
        <div class="details__tab-content active-tab">
            <div class="cart__comment">
                <?php foreach ($listbinhluan as $bl) : ?>
                    <div class="comments">
                        <div class="comment">
                            <div class="avatar"><img style="object-fit: cover;" src="./uploads/<?= $bl['hinh_anh'] ?>" alt="Avatar"></div>
                            <div class="comment-content">
                                <div class="comment-header">
                                    <span class="username"><?= $bl['ho_va_ten'] ?></span>
                                    <span class="timestamp"><?= $bl['ngay_binh_luan'] ?></span>
                                </div>
                                <p class="comment-text"><?= $bl['noi_dung'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if(isset($_SESSION['nguoidung'])) : ?>
                    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="comment__form form grid">
                        <div class="form__group">
                            <input type="hidden" name="idpro" value="<?= $idpro ?>">
                            <input type="text" class="form__input" name="noi_dung" id="comments" placeholder="Viết bình luận">
                            <div class="form__btn">
                                <input type="submit" id="btnsub" name="guibinhluan" value="Gửi" class="btn flex btn--sm">
                            </div>
                        </div>
                        <span style="color:red"><?= $errNoi_dung ?></span>
                    </form>
                <?php else : ?>
                    <div class="need">
                    <p>Bạn cần </p> <p style="visibility: hidden;"> .</p>
                    <button class="loginButton" id="loginButton"> ĐĂNG NHẬP </button>
                    <p style="visibility: hidden;"> .</p>
                    <p> để bình luận</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>
<script>
    document.getElementById("loginButton").onclick = function() {
        window.location.href = "index.php?act=dangnhap";
    };
</script>
