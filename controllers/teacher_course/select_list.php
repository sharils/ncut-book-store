<?php
require_once 'models/publisher/Publisher.php';

$args = array();
$publisher = Publisher::find();

foreach ($publisher as $value) {
    $args[$value->id()] = $value->name();
}
