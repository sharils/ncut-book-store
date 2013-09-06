<?php
class Router
{
    private static $DOCUMENT_ROOT = 'ncut-book-store/';
    private static $hostName = null;

    public static function above()
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
<link href="<?= Router::toUrl("vender/css/bootstrap.css")?>" rel="stylesheet" >
</head>
<body>
        <?php
    }

    public static function below()
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
            default:
                return '';
        }
    }

    public static function hostName($protocol, $host, $port) {
        $port = $port === 80 ? '' : ":$port";

        self::$hostName = "$protocol://$host$port/";
    }

    private static function notFound()
    {
        $status = "404 Not Found";

        header("HTTP/1.0 $status");
        echo $status;
    }

    public static function redirect($url)
    {
        header("HTTP/1.1 302 Found");
        header("Location: $url");
    }

    public static function route($redirect_url)
    {
        static $occurrence = 1;

        $redirect_url = $redirect_url();

        $redirect_url = str_replace(
            '/' . self::$DOCUMENT_ROOT,
            '',
            $redirect_url,
            $occurrence
        );

        $mime = self::getMime($redirect_url);
        if (!file_exists($redirect_url) || $mime === '') {
            self::notFound();
            exit;
        }
        header("Content-type: $mime");

        self::above();
        require_once $redirect_url;
        self::below();
    }

    public static function toUrl($path)
    {
        return self::$hostName . self::$DOCUMENT_ROOT . $path;
    }
}
