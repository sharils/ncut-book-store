<?php
chdir('..');

require_once 'models/router/Router.php';

session_start();

Router::hostName(
    isset($_SERVER['HTTPS']) ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['SERVER_PORT']
);

Router::map(function ($handler) {
    return "controllers/router/$handler.php";
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
