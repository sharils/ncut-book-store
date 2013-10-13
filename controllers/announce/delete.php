<?php
require_once 'models/announce/Announce.php';

$id = $_POST['remove_announce'];
$announce = Announce::from($id);
$announce->delete();
$url = Router::toUrl('home/announce');
Router::redirect($url);

