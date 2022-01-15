<?php
session_start();

include 'koneksi.php';

$user = $_SESSION['name'];
$postReview = $_POST['review'];
$id = $_POST['id'];

$sql = "INSERT INTO review (id_place, user_review, review) VALUES ('$id', '$user', '$postReview')";
$reviews = mysqli_query($connect, $sql);
if ($reviews) {
    echo "Berhasil diinput";
    header("location: view/detail-data.php?id=$id");
    exit;
} else {
    echo "gagal input data";
    header("location: view/detail-data.php?id=$id");
    exit;
}
