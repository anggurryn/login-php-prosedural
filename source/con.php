<?php
session_start();
$host = "localhost";
$user = "ryn";
$pass = "Skuyb4ng";
$db = "Sekolah";
$dsn = "mysql:host=$host;dbname=$db";

try {
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo $err->getMessage();
}
