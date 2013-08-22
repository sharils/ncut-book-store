<?php
class Router
{
    public static function route($path)
    {
        $path = ltrim($path, '/');

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
