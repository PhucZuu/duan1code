<?php
    // lấy sản phẩm từ chi tiết
    function getVariantById($id_sanpham,$id_color,$id_size){
        $sql="SELECT bienthe.id_bien_the,gia,giam_gia,ten_san_pham,hinh_anh,ten_kich_co,ten_mau_sac FROM bienthe 
        JOIN sanpham ON sanpham.id_san_pham=bienthe.id_sanpham 
        JOIN kichco ON kichco.id_kich_co=bienthe.id_kichco 
        JOIN mausac ON mausac.id_mau_sac=bienthe.id_mausac 
        WHERE id_sanpham=$id_sanpham AND id_mausac=$id_color AND id_kichco=$id_size";
        $variant = pdo_query_one($sql);
        return $variant;
    }
    // lấy sản phẩm từ index
    function getVariantByIdVar($id_bien_the){
        $sql="SELECT bienthe.id_bien_the,gia,giam_gia,ten_san_pham,hinh_anh,ten_kich_co,ten_mau_sac FROM bienthe 
        JOIN sanpham ON sanpham.id_san_pham=bienthe.id_sanpham 
        JOIN kichco ON kichco.id_kich_co=bienthe.id_kichco 
        JOIN mausac ON mausac.id_mau_sac=bienthe.id_mausac 
        WHERE id_bien_the=$id_bien_the";
        $variant = pdo_query_one($sql);
        return $variant;
    }
    function creatOrder($ho_va_ten,$so_dien_thoai,$dia_chi,$email,$thanh_toan,$ngay_dat_hang,$tong_thanh_tien,$ghi_chu){
        $sql="INSERT INTO donhang(id_trangthai,ho_va_ten,email,so_dien_thoai,dia_chi,thanh_toan,ngay_dat_hang,tong_thanh_tien,ghi_chu) VALUES 
        ('1','$ho_va_ten','$email','$so_dien_thoai','$dia_chi','$thanh_toan','$ngay_dat_hang','$tong_thanh_tien','$ghi_chu')";
        $id_donhang=pdo_insert_order($sql);
        return $id_donhang;
    }
    function totalPriceOrders(){
        // echo '<pre>';
        $total=0;
        // print_r($_SESSION['myCart']);
        foreach($_SESSION['myCart'] as $price){
            $total+=$price[7];
        }
        return $total;
    }
    function addOrderDetails($id_donhang,$id_bienthe,$gia,$so_luong,$thanh_tien){
        $sql="INSERT INTO chitietdonhang(id_donhang,id_bienthe,gia,so_luong,thanh_tien) VALUES 
        ('$id_donhang','$id_bienthe','$gia','$so_luong','$thanh_tien')";
        pdo_execute($sql);
    }

    function checkOutOnlineVnPay($sotien,$id_donhang){
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        $vnp_Returnurl = "http://localhost/duan1code/views/thankyou.php";
        $vnp_TmnCode = "8Z7OOO1B";//Mã website tại VNPAY 
        $vnp_HashSecret = "TYMBGHOWMDCEJEJLCTRPDYFZGKYDJPGU"; //Chuỗi bí mật

        $vnp_TxnRef = $id_donhang; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán sản phẩm';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $sotien * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        // $vnp_Bill_Email = $_POST['txt_billing_email'];
        // $fullName = trim($_POST['txt_billing_fullname']);
        // if (isset($fullName) && trim($fullName) != '') {
        //     $name = explode(' ', $fullName);
        //     $vnp_Bill_FirstName = array_shift($name);
        //     $vnp_Bill_LastName = array_pop($name);
        // }
        // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        // $vnp_Bill_City=$_POST['txt_bill_city'];
        // $vnp_Bill_Country=$_POST['txt_bill_country'];
        // $vnp_Bill_State=$_POST['txt_bill_state'];
        // // Invoice
        // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        // $vnp_Inv_Email=$_POST['txt_inv_email'];
        // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        // $vnp_Inv_Company=$_POST['txt_inv_company'];
        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef

            // "vnp_ExpireDate"=>$vnp_ExpireDate,
            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            // "vnp_Bill_Email"=>$vnp_Bill_Email,
            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            // "vnp_Bill_Address"=>$vnp_Bill_Address,
            // "vnp_Bill_City"=>$vnp_Bill_City,
            // "vnp_Bill_Country"=>$vnp_Bill_Country,
            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            // "vnp_Inv_Email"=>$vnp_Inv_Email,
            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            // "vnp_Inv_Address"=>$vnp_Inv_Address,
            // "vnp_Inv_Company"=>$vnp_Inv_Company,
            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            // "vnp_Inv_Type"=>$vnp_Inv_Type
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['checkoutConfirm'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            }
    
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    // function checkOutOnlineMoMo(){

    // }
?>