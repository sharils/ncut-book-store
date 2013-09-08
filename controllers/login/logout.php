<?php
session_destroy();
Router::redirect(Router::REFERRER);
