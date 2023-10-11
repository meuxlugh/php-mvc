<?php
define('DEBUG', true);
define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_LAYOUT', 'default');

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', 'root');
define('MYSQL_BASE', 'testserver');


define('PROOT', ($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http') . "://{$_SERVER['SERVER_NAME']}" . str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']));