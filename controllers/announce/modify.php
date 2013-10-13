<?php
require_once 'models/announce/Announce.php';
$resource = Router::resource('1');
if ($resource === 'new') {
    $id = 'NULL';
    $title = '';
    $message = '';
} else {
    $announce = Announce::from($resource);
    $id = $resource;
    $title = $announce->title();
    $message = $announce->message();
}
