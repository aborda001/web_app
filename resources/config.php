<?php
$config = array(
  "db" => array(
    "dbname" => "web_app",
    "username" => "root",
    "password" => "",
    "host" => "localhost"
  )
);

define("LIBRARY_PATH", $_SERVER["DOCUMENT_ROOT"] . "/web_app/resources/library");
define("NOTIFY_PATH", $_SERVER["DOCUMENT_ROOT"] . "/web_app/public/notification.php");
define("BASE_URL", "http://" . $_SERVER["SERVER_NAME"] . "/web_app/public");
define("TEMPLATES_PATH", $_SERVER["DOCUMENT_ROOT"] . '/web_app/resources/templates');
