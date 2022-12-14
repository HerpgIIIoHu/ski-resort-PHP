<?php
session_start();
require_once './connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
if ($_SESSION['user']['type'] == 1) {
    $path = '../img/gallery/' . time() . $_FILES['addPhoto']['name'];
    move_uploaded_file($_FILES['addPhoto']['tmp_name'], $path);
    $query = "INSERT INTO gallery SET imgUrl = '$path'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
}
mysqli_close($link);
header('Location: ../frontend/index.php');
?>