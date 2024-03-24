<?php 
session_start();
include_once '../../models/binhluan.php';
include_once '../../models/pdo.php';

$idpro = $_REQUEST['idpro'];

$listbinhluan = loadAll_binhluan($idpro);
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
                            <div class="avatar"><img src="./uploads/<?= $bl['hinh_anh'] ?>" alt="Avatar"></div>
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
                            <input type="text" class="form__input" name="noi_dung" placeholder="Viết bình luận">
                            <div class="form__btn">
                                <input type="submit" name="guibinhluan" value="Gửi" class="btn flex btn--sm">
                            </div>
                        </div>
                    </form>
                <?php else : ?>
                    <p>Bạn cần đăng nhập để bình luận</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php 
    if(isset($_POST['guibinhluan']) && $_POST['guibinhluan']){
        $id_sanpham = $_POST['idpro'];
        $noi_dung = $_POST['noi_dung'];
        $id_nguoidung = 1; // Đây là ID của người dùng đã đăng nhập
        $ngay_binh_luan = date('Y-m-d');
        
        insert_binhluan($noi_dung, $id_nguoidung, $id_sanpham, $ngay_binh_luan);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    ?>
</body>
</html>
