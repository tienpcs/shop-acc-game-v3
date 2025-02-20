<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_vong_quay = antixss($_POST['id_vong_quay']);
    $vong_quay = $ketnoi->query("SELECT * FROM `vong_quay` WHERE `id` = '$id_vong_quay' ")->fetch_array();
    
    if ($username=="") {
        die(json_encode([
            'status' => 'error',
            'msg'    => 'Đăng nhập để thực hiện'
        ]));
    } elseif ($username=="" || $id_vong_quay=="") {
        die(json_encode([
            'status' => 'error',
            'msg'    => 'Vui lòng nhập đầy đủ thông tin'
        ]));
    } elseif ($user['money'] < $vong_quay['gia']) {
        die(json_encode([
            'status' => 'error',
            'msg'    => 'Số dư không đủ '.tien($vong_quay['gia']).'đ vui lòng nạp thêm'
        ]));
    } else {
        $now = time();
        $phanthuong1 = $vong_quay['phanthuong1'];
        $phanthuong2 = $vong_quay['phanthuong2'];
        $phanthuong3 = $vong_quay['phanthuong3'];
        $phanthuong4 = $vong_quay['phanthuong4'];
        $phanthuong5 = $vong_quay['phanthuong5'];
        $phanthuong6 = $vong_quay['phanthuong6'];
        $phanthuong7 = $vong_quay['phanthuong7'];
        $phanthuong8 = $vong_quay['phanthuong8'];
        
        $tile1 = $vong_quay['tile1'];
        $tile2 = $vong_quay['tile2'];
        $tile3 = $vong_quay['tile3'];
        $tile4 = $vong_quay['tile4'];
        $tile5 = $vong_quay['tile5'];
        $tile6 = $vong_quay['tile6'];
        $tile7 = $vong_quay['tile7'];
        $tile8 = $vong_quay['tile8'];
        
        // Tính tổng tỉ lệ của các phần thưởng
        $total_tile = $tile1 + $tile2 + $tile3 + $tile4 + $tile5 + $tile6 + $tile7 + $tile8;
        
        // Tính tỉ lệ của từng phần thưởng
        $tile1_ratio = $tile1 / $total_tile;
        $tile2_ratio = $tile2 / $total_tile;
        $tile3_ratio = $tile3 / $total_tile;
        $tile4_ratio = $tile4 / $total_tile;
        $tile5_ratio = $tile5 / $total_tile;
        $tile6_ratio = $tile6 / $total_tile;
        $tile7_ratio = $tile7 / $total_tile;
        $tile8_ratio = $tile8 / $total_tile;
        
        $trutien = $ketnoi->query("UPDATE `users` SET `money` = `money` - '".$vong_quay['gia']."' WHERE `username` = '".$username."' ");
        
        if (isset($trutien)) {
            // Tính giá trị thưởng dựa vào tỉ lệ
            $rand_val = rand(1, 99999);
            $thuong = 0;
            
            if ($rand_val <= $tile1_ratio * 99999) {
                $thuong = $phanthuong1;
            } elseif ($rand_val <= ($tile1_ratio + $tile2_ratio) * 99999) {
                $thuong = $phanthuong2;
            } elseif ($rand_val <= ($tile1_ratio + $tile2_ratio + $tile3_ratio) * 99999) {
                $thuong = $phanthuong3;
            } elseif ($rand_val <= ($tile1_ratio + $tile2_ratio + $tile3_ratio + $tile4_ratio) * 99999) {
                $thuong = $phanthuong4;
            } elseif ($rand_val <= ($tile1_ratio + $tile2_ratio + $tile3_ratio + $tile4_ratio + $tile5_ratio) * 99999) {
                $thuong = $phanthuong5;
            } elseif ($rand_val <= ($tile1_ratio + $tile2_ratio + $tile3_ratio + $tile4_ratio + $tile5_ratio + $tile6_ratio) * 99999) {
                $thuong = $phanthuong6;
            } elseif ($rand_val <= ($tile1_ratio + $tile2_ratio + $tile3_ratio + $tile4_ratio + $tile5_ratio + $tile6_ratio + $tile7_ratio) * 99999) {
                $thuong = $phanthuong7;
            } else {
                $thuong = $phanthuong8;
            }
            
            $thanhtoan = $ketnoi->query("INSERT INTO `history_vong_quay` SET 
            `username` = '$username',
            `vong_quay` = '$id_vong_quay',
            `thuong` = '$thuong',
            `time` = '$now'");
            $kc = $ketnoi->query("UPDATE `users` SET `kimcuong` = `kimcuong` + '".$thuong."' WHERE `username` = '".$username."' ");
            if (isset($thanhtoan)) {
                die(json_encode([
                    'status' => 'success',
                    'msg'    => 'Bạn đã nhận được '.tien($thuong).' kim cương'
                ]));
            }
        }
    }
}
?>