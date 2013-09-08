<?php
session_destroy();
$url = Router::toUrl('login');
Router::redirect($url);
