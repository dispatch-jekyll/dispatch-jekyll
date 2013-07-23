<?php
	require_once('config.php');
	$url = 'https://github.com/login/oauth/authorize';
    $url .= '?client_id='.CLIENT_ID.'';
    $url .= '&scope=repo,delete_repo';
    header('Location: '.$url);
?>