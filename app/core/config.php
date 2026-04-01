<?php
// app/core/config

define('URL_ROOT', 'http://localhost/blog_sept/public');
define('DBNAME', '');
define('USERNAME', 'root');
define('PASSWORD', '');
define('BASE_URL', str_replace('\\', '/', dirname(dirname(__FILE__))));
define('APP_NAME', 'Blog Application');


// In your config file
define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . '/blog_sept/public/assets/images/uploads/');
define('UPLOAD_URL', URL_ROOT . '/assets/images/uploads/');

