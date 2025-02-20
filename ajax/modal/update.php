<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = antixss($_POST['id']);
    $sale = antixss($_POST['sale']);
    $ck = antixss($_POST['ck']);
    $gio = antixss($_POST['gio']);
    
    $acc = $ketnoi->query("SELECT * FROM `list_acc_game` WHERE `id` = '$id' ")->fetch_array();
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
                $capnhat = $ketnoi->query("UPDATE `list_acc_game` SET 
                `sale` = '$sale',
                `gio` = '$gio',
                `ck` = '$ck' 
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