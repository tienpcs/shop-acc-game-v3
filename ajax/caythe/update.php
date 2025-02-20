<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = antixss($_POST['id']);
    $status = antixss($_POST['status']);

    
    $acc = $ketnoi->query("SELECT * FROM `don_caythue` WHERE `id` = '$id' ")->fetch_array();
    if ($username=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Đăng nhập để thực hiện'
        ]));
    }elseif ($id=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập đầy đủ thông tin'
        ]));
    }elseif (empty($id)) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Acc không tồn tại'
        ]));
     }else{
            if($acc){
                $capnhat = $ketnoi->query("UPDATE `don_caythue` SET 
                `status` = '$status'
                WHERE `id` = '".$id."' ");

                if(isset($capnhat)){

                    die(json_encode([
                        'status'    => 'success',
                        'msg'       => 'Cập Nhật thành công'
                    ]));
                }else{
                    die(json_encode([
                        'status'    => 'error',
                        'msg'       => 'Lỗi khi câp nhật'
                    ]));
                }
            }else{
                die(json_encode([
                    'status'    => 'error',
                    'msg'       => 'Lỗi '
                ]));
            }
        
    }
}
?>