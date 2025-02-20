<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if ($_POST['action'] == 'total') {
    $id = antixss($_POST['goi']);
    if (empty($id)) {
        die('Vui lòng chọn máy chủ');
    }
   $dvr = $ketnoi->query("SELECT * FROM `goi_caythue` WHERE `id` = '".$id."' ")->fetch_array();
    if ($dvr) {
        $total_phi = $dvr['gia'];
    } else {
        $total_phi = 0;
    }
    die(tien($total_phi));
}
if ($_POST['action'] == 'caythue') {
    $goi = antixss($_POST['goi']);
    $taikhoan = antixss($_POST['taikhoan']);
    $matkhau = antixss($_POST['matkhau']);
    $mkc2 = antixss($_POST['mkc2']);
    $ghichu = antixss($_POST['ghichu']);
    
    $cay_thue = $ketnoi->query("SELECT * FROM `goi_caythue` WHERE `id` = '$goi' ")->fetch_array();
    
    if ($username=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Đăng nhập để thực hiện'
        ]));
    }elseif ($taikhoan=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập đầy đủ thông tin'
        ]));
    }elseif (empty($goi)) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Gói Không Tồn Tại'
        ]));
    } elseif ($matkhau=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập đầy đủ thông tin'
        ]));
    }else{
        
        $tongtien =  $cay_thue['gia'];
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
                $thanhtoan = $ketnoi->query("INSERT INTO `don_caythue` SET 
                `username` = '$username',
                `taikhoan` = '$taikhoan',
                `matkhau` = '$matkhau',
                `2fa` = '$mkc2',
                `ghichu` = '$ghichu',
                `loai` = '$goi',
                `status` = 'xuly' ");
                
                $ketnoi->query("UPDATE `loai_tai_khoan` SET `buy` = `buy` +1 WHERE `id` = '".$cay_thue['loai']."' ");
                if(isset($thanhtoan)){
                    
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
}
?>