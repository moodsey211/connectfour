<?php

/**
 * Define all constants here
 */
define('SITENAME', 'ConnectFour');

if($_SERVER['HTTP_HOST'] != 'localhost') {
    define('DBHOST', 'localhost');
    define('DBNAME', 'd4158a4bg2bf2j');
    define('DBUSER', 'cfopkagjzicpdx');
    define('DBPASS', 'ZidhZKcgyOqV71WZDpmjGkcRTg');
}

defined('DBHOST') OR define('DBHOST', 'localhost');
defined('DBNAME') OR define('DBNAME', 'connectf');
defined('DBUSER') OR define('DBUSER', 'postgres');
defined('DBPASS') OR define('DBPASS', 'password');
