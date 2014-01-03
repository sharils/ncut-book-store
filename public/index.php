<?php
chdir('..');
require_once 'vendor/autoload.php';
require_once 'models/container/Container.php';
require_once 'models/database/Database.php';
require_once 'models/router/Router.php';
require_once 'models/router/Notice.php';
require_once 'models/router/Parameter.php';
require_once 'models/router/Page.php';

use ncut_book_store\Container;
date_default_timezone_set('Asia/Taipei');

Container::settings(parse_ini_file('settings/ncut-book-store.ini', true));
$settings = Container::settings('database');
Database::initialise($settings['host'], $settings['user'], $settings['password'], $settings['database']);

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
        case 'forgot':
            return 'views/login/forgot.php';
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

