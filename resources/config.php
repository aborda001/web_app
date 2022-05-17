<?php
$config = array(
  "db" => array(
    "dbname" => "web_app",
    "username" => "root",
    "password" => "",
    "host" => "localhost"
  ),
  "paths" => array(
    "resources" =>  $_SERVER["DOCUMENT_ROOT"] . "/web_app/resources",
    "images" => array(
      "layout" => $_SERVER["DOCUMENT_ROOT"] . "/web_app/public/images/layout"
    )
  )
);

define("LIBRARY_PATH", $_SERVER["DOCUMENT_ROOT"] . "/web_app/resources/library");

define("TEMPLATES_PATH", $_SERVER["DOCUMENT_ROOT"] . '/web_app/resources/templates');
