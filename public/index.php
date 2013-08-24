<?php
chdir('..');

require_once 'models/router/Router.php';

Router::route($_SERVER['REQUEST_URI']);
