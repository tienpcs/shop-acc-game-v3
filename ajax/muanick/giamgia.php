<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = antixss($_POST['type']);
    $sotien = antixss($_POST['sotien']);
    $magiamgia = antixss($_POST['magiamgia']);
    $giamgia = $ketnoi->query("SELECT * FROM `ma_giam_gia` WHERE `magiamgia` = '$magiamgia' ")->fetch_array();
    if ($username=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Đăng nhập để thực hiện'
        ]));
    }elseif ($magiamgia==""||$type==""||$sotien=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập mã giảm giá'
        ]));
    }elseif ($sotien<10000) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Chi tiêu ít nhất 10.000đ'
        ]));
    }elseif ($magiamgia==""||$type=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập mã giảm giá'
        ]));
    }else if(empty($giamgia)){
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Mã giảm giá không tồn tại'
        ]));
    }elseif ($type!=$giamgia['type']) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Mã giảm giá không hợp lệ'
        ]));
    }else if($giamgia['soluong'] == 0){
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Mã giảm giá đã hết'
        ])); 
    }else if($giamgia['batdau'] > $now){
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Mã giảm giá bắt đầu vào '.ngay($giamgia['batdau'])
        ]));
    }else if($giamgia['ketthuc'] < $now){
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Mã giảm giá hết hạn lúc '.ngay($giamgia['ketthuc'])
        ]));
    }else{
        if($giamgia['theo']=='phantram'){
            $giam = $sotien - ($sotien * ($giamgia['giamgia'] / 100));
            $ketnoi->query("UPDATE `ma_giam_gia` SET `soluong` = `soluong` - 1 WHERE `magiamgia` = '$magiamgia' ");
            
        }elseif($giamgia['theo']=='sotien'){
            if($sotien - $giamgia['giamgia'] == 0 || $sotien - $giamgia['giamgia'] < 0){
                die(json_encode([
                    'status'    => 'error',
                    'msg'       => 'Không thể sử dụng mã giảm giá vì giá tiền mua ít hơn số tiền được giảm.'
                ]));
            }else{
                $ketnoi->query("UPDATE `ma_giam_gia` SET `soluong` = `soluong` - 1 WHERE `magiamgia` = '$magiamgia' ");
                $giam = $sotien - $giamgia['giamgia'];
                
            }
        }else{
            $ketnoi->query("UPDATE `ma_giam_gia` SET `soluong` = `soluong` - 1 WHERE `magiamgia` = '$magiamgia' ");
            $giam = $sotien;
        }
        die(json_encode([
            'status'    => 'success',
            'giam'    => tien($giam).'đ',
            'msg'       => 'Bạn đã được giảm còn '.tien($giam).'đ'
        ]));
    }
}
?>