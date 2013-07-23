<?php
session_start();
require_once('config.php');
$code = $_GET['code'];
$url = 'https://github.com/login/oauth/access_token';

    $data = array(
        'client_id' => CLIENT_ID, 
        'client_secret' => CLIENT_SECRET,
        'code' => $_GET['code']
    );

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = parse_str(file_get_contents($url, false, $context));
    $_SESSION['access_token'] = $access_token;
    header('Location: /');
?>