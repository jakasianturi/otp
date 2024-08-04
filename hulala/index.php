<?php

session_start();

require_once('app/config.php');

$page = isset($_GET['page']) ? $_GET['page'] : false;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

// HTML head tag
include_once("".BASE_PATH."/templates/head.php");

// Get filenames to create dynamic content
$filename = "$page.php";

if (file_exists($filename)) {
    include_once($filename);
} else {
    include_once("".BASE_PATH."/home.php");
}
// HTML body tag
include_once("" . BASE_PATH . "/templates/body.php");
