<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
$client = new Google_Client();
$client->setClientId($config['client_id']);
$client->setClientSecret($config['client_secret']);
$client->setRedirectUri($config['redirect_uri']);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $_SESSION['access_token'] = $token['access_token'];

    $oauth2 = new Google_Service_Oauth2($client);
    $userinfo = $oauth2->userinfo->get();

    $_SESSION['user_id'] = $userinfo->id;
    $_SESSION['email'] = $userinfo->email;
    $_SESSION['name'] = $userinfo->name;

    // Kiểm tra xem người dùng đã tồn tại trong cơ sở dữ liệu hay chưa
    $google_id = $userinfo->id;
    $email = $userinfo->email;
    $name = $userinfo->name;
    $token = json_encode($token);
    $tokenData = json_decode($token, true);
    $accessToken = $tokenData['access_token'];
    
    $tokens = md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6) . time());

   $result = $TN->query("SELECT id FROM users WHERE username = $google_id");
   
    if ($result->num_rows > 0) {
        // Người dùng đã tồn tại, cập nhật thông tin
        
      $stmt = $TN->update("users", array(
                'email'    => $email,
                'name'         => $name,
                'time_session' => time(),
                'loai'      => 'gg',
                'token'  => $tokens
            ), " `username` = '".$google_id."' ");
    } else {
        $stmt = $TN->insert("users", [
        'token'         => $tokens,
        'username'      => $google_id,
        'name'      => $name,
        'email'         => $email,
        'password'      => sha1($google_id),
        'ip'            => myip(),
        'loai'         => 'Google',
        'device'        => $_SERVER['HTTP_USER_AGENT'],
        'create_date'   => gettime(),
        'update_date'   => time(),
        'time_session'  => time()
    ]);
    
    }
    if ($stmt) {
        $TN->insert("logs", [
            'user_id'       => $TN->get_row("SELECT * FROM `users` WHERE `token` = '$tokens' ")['id'],
            'ip'            => myip(),
            'device'        => $_SERVER['HTTP_USER_AGENT'],
            'create_date'    => gettime(),
            'action'        => 'Login Google thành Công'
         ]);

    }
   setcookie("token", $tokens, time() + $TN->site('session_login'), "/");
    $_SESSION['login'] = $tokens;
    sendTele(templateTele($name." đăng nhập Qua Google thành công"));
    header('Location: /client/home');
    exit();
} else {
    echo 'Authorization code is not available';
}
?>
