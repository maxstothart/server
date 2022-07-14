<?php
// (A) ERROR REPORTING
error_reporting(E_ALL & ~E_NOTICE);
ini_set("display_errors", 1);

// (B) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "txt");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "4138015462");

// (C) START SESSION - ACT AS USER
session_start();
$_SESSION["user"] = ["id" => 1, "name" => "Joa Doe"];
// $_SESSION["user"] = ["id" => 2, "name" => "Job Doe"];
// $_SESSION["user"] = ["id" => 3, "name" => "Joe Doe"];
// $_SESSION["user"] = ["id" => 4, "name" => "Jon Doe"];
// $_SESSION["user"] = ["id" => 5, "name" => "Joy Doe"];
