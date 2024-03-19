<?php
    // include hoặc require tất cả các file có trên hệ thống (controllers/commons/models). Views ở trong controllers
    // require commons
    

    // require controllers
    
    // require models
    
    // Điều hướng
    include_once './views/header.php';
    $act= $_GET['act'] ?? '/';
    switch ($act) {
        case '/':
            homeIndex();
            break;
        
        default:
            # code...
            break;
    }
    include_once './views/footer.php';

?>