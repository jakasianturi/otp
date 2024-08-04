<?php
// URL
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

// Get filename
$getFileName = $_SERVER["PHP_SELF"];

// BASE_URL
defined("BASE_URL") or define("BASE_URL", "http://localhost/otp/hulala");

// BASE_PATH
defined("BASE_PATH") or define("BASE_PATH", realpath($_SERVER['DOCUMENT_ROOT'] . '/otp/hulala'));

// LIBRARY_PATH
defined("LIBRARY_PATH") or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/lib'));

// TEMPLATES_PATH
defined("TEMPLATES_PATH") or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

// Connection to database
$server = "localhost";
$database = "otp";
$username = "root";
$password = "password";

$conn = mysqli_connect($server, $username, $password, $database) or die("Koneksi ke database gagal");
