<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if (!$username) {
    header("Location: ".BASE_URL."?page=login");
    exit(); // Pastikan untuk mengakhiri eksekusi skrip setelah pengalihan
}
