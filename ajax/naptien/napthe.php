<?php 
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';
$type_the = antixss($_POST['type_the']);
$menh_gia = antixss($_POST['menh_gia']);
$ma_the   = antixss($_POST['ma_the']);
$seri_the = antixss($_POST['seri_the']);
$code1 = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 12);
if ($username=="") {
    die(json_encode([
        'status'    => 'error',
        'msg'       => 'Đăng nhập để thực hiện'
    ]));
}elseif ($type_the == '') {
   die(json_encode([
        'status'    => 'error',
        'msg'       => 'Vui lòng chọn loại thẻ'
    ]));
} elseif($menh_gia == '') {
     die(json_encode([
        'status'    => 'error',
        'msg'       => 'Vui lòng chọn mệnh giá thẻ'
    ]));
}elseif($ma_the == ''|| $seri_the== '') {
     die(json_encode([
        'status'    => 'error',
        'msg'       => 'Vui lòng nhập đầy đủ thông tin'
    ]));
} elseif(!(ctype_digit($ma_the))|| !(ctype_digit($seri_the))) {
     die(json_encode([
        'status'    => 'error',
        'msg'       => 'Hãy nhập giá trị là số!'
    ]));
} else{
        $data = dv_the($bdtvl['web_gach_the'], $bdtvl['partner_id']);
        foreach ($data as $item) {
            if($item['telco']== $type_the){
                if($item['value'] ==$menh_gia){
                    $thucnhan = $item['value']*((100-($item['fees']))/100);
                }
            }
        }
        $command = 'charging'; // Nap the
        require $_SERVER['DOCUMENT_ROOT'].'/hethong/xulythe.php';
        $request_id = rand(100000000, 999999999);
        $telco = $type_the;
        $amount = $menh_gia;
        $code = $ma_the;
        $serial = $seri_the;
        $dataPost = array();
        $dataPost['partner_id'] = $partner_id;
        $dataPost['request_id'] = $request_id;
        $dataPost['telco'] = $telco;
        $dataPost['amount'] = $menh_gia;
        $dataPost['serial'] = $serial;
        $dataPost['code'] = $code;
        $dataPost['command'] = $command;
        $sign = creatSign($partner_key, $dataPost);
        $dataPost['sign'] = $sign;
        $data = http_build_query($dataPost);

        // CHẠY CURL
        $ch = curl_init();
        // QUÁ TRÌNH GỬI LÊN (ĐỪNG THAY ĐỔI)
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $SERVER_NAME = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        curl_setopt($ch, CURLOPT_REFERER, $SERVER_NAME);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        // ĐÓNG GỬI LÊN
        curl_close($ch);
        $obj = json_decode($result);
        $msg = $obj->message;
        if ($obj->status == 99) {
        $create = $ketnoi->query("INSERT INTO `history_nap_the` SET 
              `username` = '$username',
              `code` = '$code1',
              `seri` = '$seri_the',
              `pin` = '$ma_the',
              `loaithe` = '$type_the',
              `menhgia` = '$menh_gia',
              `thucnhan` = '$thucnhan',
              `status` = 'xuly',
              `note` = '$msg',
              `time` = '$time' ");
              if($create){
                die(json_encode([
                    'status'    => 'success',
                    'msg'       => 'Nạp thẻ thành công'
                ]));
              }
        }else{
            die(json_encode([
                'status'    => 'error',
                'msg'       => $msg
            ]));
        }
}
?>