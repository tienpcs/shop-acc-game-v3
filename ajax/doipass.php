<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($username==""){
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng đăng nhập'
        ]));
    }elseif ($_POST['oldpassword']==""||$_POST['repassword1']==""||$_POST['repassword2']=="") {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập đầy đủ thông tin'
        ]));
    }else{
        $password = antixss($_POST['oldpassword']);
        $repassword1 = antixss($_POST['repassword1']);
        $repassword2 = antixss($_POST['repassword2']);
        $user = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' AND `bannd` = 0 ")->fetch_array();
       if($repassword1!= $repassword2){
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Mật khẩu mới không giống nhau'
            ]));
        }else if ($repassword1 == $password) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Mật khẩu mới không được giống mật khẩu cũ!'
            ]));
        }else if (sha1(md5($password)) != $user['password']) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Mật khẩu cũ không chính xác!'
            ]));
        }else{
            $newpass = sha1(md5($repassword1));
            $update = $ketnoi->query("UPDATE `users` SET `password` = '$newpass' WHERE `username` = '$username' ");
            if(isset($update)){
                die(json_encode([
                    'status'    => 'success',
                    'msg'       => 'Đổi mật khẩu thành công'
                ])); 
            }else{
                die(json_encode([
                    'status'    => 'error',
                    'msg'       => 'Lỗi hệ thống, vui lòng báo admin'
                ]));
            }
        }
    }
}
?>