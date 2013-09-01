<?php
class Router
{
    private static $DOCUMENT_ROOT = 'ncut-book-store/';
    private static $hostName = null;

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

        if (!file_exists($redirect_url)) {
            self::notFound();
            exit;
        }

        require_once $redirect_url;
    }

    public static function toUrl($path)
    {
        return self::$hostName . self::$DOCUMENT_ROOT . $path;
    }
}
