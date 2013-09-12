<?php
chdir('..');

require_once 'models/router/Router.php';
require_once 'models/router/Notice.php';

session_start();

Notice::set(function () {
    if (isset($_GET['notice'])) {
        return $_GET['notice'];
    }
});

Router::hostName(
    isset($_SERVER['HTTPS']) ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['SERVER_PORT']
);

Router::map(function ($handler, $resource) {
    switch ($handler) {
        case 'controllers':
        case 'vendor':
            return "$handler/$resource";
    }

    if (!isset($_SESSION['user_id'])) {
        return 'views/login/login.php';
    }

    if ($handler === '') {
        $handler = 'home';
    }

    return "controllers/router/$handler.php";
});

Router::referrer(function () {
    return isset($_SERVER['HTTP_REFERER'])
        ? $_SERVER['HTTP_REFERER']
        : Router::REDIRECT_URL;
});

Router::route(function () {
    $query_string = array();
    parse_str($_SERVER['QUERY_STRING'], $query_string);
    unset($query_string['REDIRECT_URL']);
    $_SERVER['QUERY_STRING'] = http_build_query($query_string);

    $redirect_url = $_GET['REDIRECT_URL'];
    unset($_GET['REDIRECT_URL'], $_REQUEST['REDIRECT_URL']);

    return $redirect_url;
});

