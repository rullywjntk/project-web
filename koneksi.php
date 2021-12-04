<?php
$namaHost = "localhost";
$username = "root";
$password = "12345678";
$database = "project_uts";
$base_url = "http://localhost/project-uts/";

// try {
//     $db = new PDO("mysql:host=$namaHost;dbname=$database", $username, $password);
// } catch (PDOException $e) {
//     die("Terjadi kesalahan: " . $e->getMessage());
// }

$connect = mysqli_connect($namaHost, $username, $password, $database);
// include 'place.php';
// $place = new Place($connect, $base_url);

// include 'Category.php';
// $category = new Category($connect, $base_url);
