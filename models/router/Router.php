<?php
class Router
{
    const REFERRER = 'referrer';
    const REDIRECT_URL = 'redirect_url';

    private static $DOCUMENT_ROOT = 'ncut-book-store/';
    private static $hostName = null;
    private static $map = null;
    private static $redirect_url = null;
    private static $referrer = null;
    private static $resource = null;

    private static function above()
    {
        ?>
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>國立勤益科技大學 - 線上訂書系統</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<!-- Bootstrap core CSS -->
<link href="<?= Router::toUrl("vendor/css/bootstrap.css")?>" rel="stylesheet" >
</head>
<body>
        <?php
    }

    private static function below()
    {
        ?>
</body>
</html>
        <?php
    }

    private static function getMime($redirect_url)
    {
        $matches = array();
        preg_match('/\.([^.]+)$/', $redirect_url, $matches);
        if (!isset($matches[1])) {
            return '';
        }
        $extension = $matches[1];

        switch ($extension) {
            case 'css':
                return 'text/css';
            case 'js':
                return 'text/javascript';
            case 'png':
                return 'image/png';
            case 'php':
                return 'text/html';
            case 'svg':
                return 'image/svg+xml';
            case 'ttf':
                return 'font/opentype';
            case 'woff':
                return 'application/font-woff';
            default:
                return '';
        }
    }

    public static function hostName($protocol, $host, $port) {
        $port = $port === 80 ? '' : ":$port";

        self::$hostName = "$protocol://$host$port/";
    }

    public static function map($map)
    {
        if (is_callable($map)) {
            self::$map = $map;
            return;
        }

        $redirect_url = (string) $map;

        $map = self::$map;
        if (!is_callable($map)) {
            return $redirect_url;
        }

        $resources = explode('/', $redirect_url, 2) + array(null, null);
        self::$resource = $resources[1];

        return call_user_func_array($map, $resources);
    }

    private static function notFound()
    {
        $status = "404 Not Found";

        header("HTTP/1.0 $status");
        echo $status;
    }

    public static function redirect($url)
    {
        if ($url === self::REFERRER) {
            $url = self::$referrer;
        }

        header("HTTP/1.1 302 Found");
        header("Location: $url");
    }

    public static function referrer($referrer = null)
    {
        if (is_callable($referrer)) {
            self::$referrer = (string) $referrer();
            return;
        }

        if (self::$referrer === self::REDIRECT_URL) {
            return self::$redirect_url;
        }

        return self::$referrer;
    }

    public static function resource($resource_index = null)
    {
        if (func_num_args() === 0) {
            return self::$resource;
        }

        $resources = explode('/', self::$resource);

        return isset($resources[$resource_index])
            ? $resources[$resource_index]
            : null;
    }

    public static function route($redirect_url)
    {
        static $occurrence = 1;

        $redirect_url = $redirect_url();

        $redirect_url = self::$redirect_url = str_replace(
            '/' . self::$DOCUMENT_ROOT,
            '',
            $redirect_url,
            $occurrence
        );

        $handler_path = self::map($redirect_url);
        $mime = self::getMime($handler_path);
        if (!file_exists($handler_path) || $mime === '') {
            self::notFound();
            exit;
        }

        if ($mime === 'text/html') {
            self::above();
        }

        header("Content-type: $mime");
        call_user_func(function () {
            require_once func_get_arg(0);
        }, $handler_path);

        if ($mime === 'text/html') {
            self::below();
        }
    }

    public static function toUrl($path)
    {
        return self::$hostName . self::$DOCUMENT_ROOT . $path;
    }
}
