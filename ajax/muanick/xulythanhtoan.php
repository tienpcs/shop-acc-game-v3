<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_acc = antixss($_POST['id_acc']);
    $magiamgia = antixss($_POST['magiamgia']);
    $acc = $ketnoi->query("SELECT * FROM `list_acc_game` WHERE `id` = '$id_acc' ")->fetch_array();
    $giamgia = $ketnoi->query("SELECT * FROM `ma_giam_gia` WHERE `magiamgia` = '$magiamgia' AND `status` = 'ON'")->fetch_array();
    if ($username=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Đăng nhập để thực hiện'
        ]));
    }elseif ($id_acc=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập đầy đủ thông tin'
        ]));
    }elseif (empty($id_acc)) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Acc không tồn tại'
        ]));
    }else if($acc['username'] != ""){
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Acc này đã được bán'
        ]));
    }else if($acc['ngaymua'] != ""){
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Acc này đã được bán'
        ]));
    }else{
        $loai = $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '".$acc['loai']."' ")->fetch_array();
        $danhmuc = $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '".$loai['danhmuc']."' ")->fetch_array();
        if($danhmuc['type']=="muanick"){
            $giaacc = ($acc['gia'] - ($acc['gia'] * ($acc['ck'] / 100)));
        }elseif($danhmuc['type']=="random"){
            $giaacc = ($loai['noidung'] - ($loai['noidung'] * ($acc['ck'] / 100)));
        }
        $tongtien =  magiamgia($magiamgia, $danhmuc['type'], $giaacc);
        if($user['money'] < $tongtien){
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Số dư không đủ '.tien($tongtien).'đ vui lòng nạp thêm'
            ]));
        }else{
            $now = time();
            $tiencon = $user['money'] - $tongtien;
            $trutien = $ketnoi->query("UPDATE `users` SET `money` = '$tiencon' WHERE `username` = '".$username."' ");
            if(isset($trutien)){
                $thanhtoan = $ketnoi->query("UPDATE `list_acc_game` SET 
                `username` = '$username',
                `status` = 'daban',
                `ngaymua` = '$now' 
                WHERE `id` = '".$id_acc."' ");
                $ketnoi->query("UPDATE `loai_tai_khoan` SET `buy` = `buy` +1 WHERE `id` = '".$acc['loai']."' ");
                if(isset($thanhtoan)){
                    if($magiamgia!=""){
                    $ketnoi->query("UPDATE `ma_giam_gia` SET `soluong` = `soluong` 11 WHERE `giamgia` = '".$magiamgia."' ");
                    }
                    die(json_encode([
                        'status'    => 'success',
                        'msg'       => 'Thanh toán thành công'
                    ]));
                }else{
                    die(json_encode([
                        'status'    => 'error',
                        'msg'       => 'Lỗi khi thanh toán'
                    ]));
                }
            }else{
                die(json_encode([
                    'status'    => 'error',
                    'msg'       => 'Lỗi khi trừ tiền'
                ]));
            }
        }
    }
}
?>