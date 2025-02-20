<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

$bdtvl_list_result = $ketnoi->query("SELECT * FROM `sale` WHERE `status` = '1'");
if ($bdtvl_list_result && $bdtvl_list_result->num_rows > 0) {
    while ($dvr_list = $bdtvl_list_result->fetch_array()) {
        $batdau = $dvr_list['batdau'];

        $bdtvl_acc_result = $ketnoi->query("SELECT * FROM `list_acc_game` WHERE `sale` = '1' AND `gio` = '$batdau' AND `status` = 'daban'");
        if ($bdtvl_acc_result && $bdtvl_acc_result->num_rows > 0) {
            while ($dvr_acc = $bdtvl_acc_result->fetch_array()) {
                $id = $dvr_acc['id'];
                
                if ($gio > $batdau) {
                $create = mysqli_query($ketnoi, "UPDATE `list_acc_game` SET `sale`= '0', `gio` = '0' WHERE `id`='$id'");
                }
            }
        } else {
            echo 'Lỗi: Không tìm thấy tài khoản cần cập nhật<br>';
        }
    }
} else {
    echo 'Không tìm thấy tài khoản nào cần set lại giờ sale<br>';
}
?>
