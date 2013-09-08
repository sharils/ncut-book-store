<?php
require_once "models/database/Database.php";
require_once "models/publisher/Publisher.php";
Database::initialise('localhost', 'root', '123456', 'ncut');
$resource = Router::resource('1');
$args = array(
    'id'        => NULL,
    'email'     => NULL,
    'account'   => NULL,
    'address'   => NULL,
    'name'      => NULL,
    'person'    => NULL,
    'phone'     => NULL,
    'phone_ext'     => NULL
);
$diff = array('status' => '新增', 'class' => 'btn-primary');
if ($resource !== 'new') {
    $publisher = Publisher::from($resource);
    foreach ($args as $key => &$value) {
        $args[$key] = $publisher->$key();
    }
    $diff = array('status' => '修改', 'class' => 'btn-warning');
}
