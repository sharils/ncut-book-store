<?php
namespace ncut_book_store;

use Exception;
use PHPMailer;

class Container
{
    private static $settings = null;

    public static function settings($settings = null)
    {
        if (is_array($settings)) {
            self::$settings = $settings;
            return;
        }

        if (is_string($settings)) {
            $section = $settings;
            $settings = self::$settings;
            if (!isset($settings[$section])) {
                throw new Exception('Section does not exist in the ini file.');
            }
            return $settings[$section];
        }
    }

    public static function newPHPMailer()
    {
        $settings = self::settings('mail');

        $phpMailer = new PHPMailer();
        $phpMailer->Host = $settings['host'];
        $phpMailer->IsSMTP();
        $phpMailer->Password = $settings['password'];
        $phpMailer->Port = $settings['port'];
        $phpMailer->SMTPAuth = true;
        $phpMailer->SMTPSecure = 'tls';
        call_user_func_array(
            array(
                $phpMailer,
                'SetFrom'
            ),
            $settings['from']
        );
        $phpMailer->Username = $settings['username'];

        return $phpMailer;
    }
}
