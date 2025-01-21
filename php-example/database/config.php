<?php
$hn = "localhost";
$un = "edwardpov_admin";
$pw = "20350241";
$db = "music_um";
// create database connection
$conn = new mysqli($hn, $un, $pw, $db);
// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}