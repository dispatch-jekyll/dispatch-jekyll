<?php
session_start();

require 'Slim/Slim.php';
require 'config.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
    'log.level' => \Slim\Log::WARN,
    'session.handler' => null,
    'debug'=> true
));

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

// CONFIG
$app->config(array(
    'templates.path' => './views'
));

// GET route
$app->get('/', function () use ($app) {

    $app->render('home.php');
});

$app->get('/callback', function () use ($app) {
    $app->render('callback.php');
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
    $app->redirect('/', 301);

});

$app->get('/login', function () use ($app) {
    $url = 'https://github.com/login/oauth/authorize';
    $url .= '?client_id='.CLIENT_ID.'';
    $url .= '&scope=repo,delete_repo';
    //echo $url;
    //die;
    $app->redirect($url, 301);
});

$app->get('/logout', function () use ($app) {
    //$_SESSION['access_token']='';
    session_destroy();
    session_start();
    $_SESSION['access_token'] = '';
    $app->redirect('/', 301);
});

// POST route
$app->post(
    '/post',
    function () {
        echo 'This is a POST route';
    }
);

// PUT route
$app->put(
    '/put',
    function () {
        echo 'This is a PUT route';
    }
);

// PATCH route
$app->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$app->delete(
    '/delete',
    function () {
        echo 'This is a DELETE route';
    }
);

$app->get('/:repo', function ($repo) use ($app) {
    $app->render('site.php', array('repo' => $repo));
});

$app->run();
