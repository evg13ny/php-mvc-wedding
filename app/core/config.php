<?php

if ($_SERVER["SERVER_NAME"] == "localhost") {
    define("DBNAME", "php-mvc-wedding");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");

    define("ROOT", "http://localhost/php-mvc-wedding/public");
} else {
    define("DBNAME", "php-mvc_test_db");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");

    define("ROOT", "https://www.yourwebsite.com");
}

define("APP_NAME", "Jack & Rose");
define("APP_DESC", "We're getting married");

/** true means show errors */
define("DEBUG", true);
