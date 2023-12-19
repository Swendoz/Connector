<?php

$dbHost = "localhost";
$dbName = "connector";
$dbUser = "root";
$dbPass = "";

$pdo = new PDO("mysql:host=$dbHost; dbname=$dbName;", $dbUser, $dbPass);

if (!$pdo) {
    echo "<script>alert('Database failed while connecting')</script>";
}
