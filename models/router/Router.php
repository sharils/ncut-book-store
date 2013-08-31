<?php
class Router
{
    private static $DOCUMENT_ROOT = '/ncut-book-store/';

    public static function route($path)
    {
        static $occurrence = 1;

        $path = str_replace(self::$DOCUMENT_ROOT, '', $path, $occurrence);

        if (!file_exists($path)) {
            self::notFound();
            exit;
        }

        require_once $path;
    }

    private static function notFound()
    {
        $status = "404 Not Found";

        header("HTTP/1.0 $status");
        echo $status;
    }
}
