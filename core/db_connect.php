<?php
session_start();

/**
 * Voor de MAC gebruikers;
 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "webdev_base";

/**
 * Voor de Windows gebruikers;
 */
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "webdev_base";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

define("BASEURL","http://localhost/webdev-base/");
define("BASEURL_CMS","http://localhost/webdev-base/admin/");
define("ABSOLUTE_HREF","/Users/kborghols/Sites/localhost/webdev-base/");
// define("ABSOLUTE_HREF","C:/xampp/htdocs/webdev-base/");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}