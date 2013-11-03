<?php
require_once 'models/publisher/Publisher.php';

$publishers = Publisher::find();
$publishers = Page::getLimit($publishers);
