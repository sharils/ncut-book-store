<?php
require_once 'models/database/Database.php';
require_once 'models/publisher/Publisher.php';

Database::initialise('localhost', 'root', '123456', 'ncut');
$publishers = Publisher::find();