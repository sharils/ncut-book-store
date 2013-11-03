<?php
require_once 'models/announce/Announce.php';
$announces = Announce::find();
$announces = Page::getLimit($announces);
