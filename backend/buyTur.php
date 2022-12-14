<?php
session_start();
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$id = $_SESSION['user']['id'];
$LastName = $_SESSION['user']['LastName'];
$FirstName = $_SESSION['user']['FirstName'];
$MiddleName = $_SESSION['user']['MiddleName'];
$Phone = $_SESSION['user']['Phone'];
$Email = $_SESSION['user']['Email'];
$tur = $_GET['id'];
$date = date("Y/m/d");
$price = $_GET['price'];

$query = "INSERT INTO `bronirovanieTura` SET idKlienta = '$id', LastName = '$LastName', FirstName = '$FirstName',
MiddleName = '$MiddleName', Phone = '$Phone', Email = '$Email', numberTur = '$tur', date = '$date', price = '$price'";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

if (!$result) {
    header('Location: ./frontend/index.php');
} else {
    header('Location: ../frontend/index.php');
}
mysqli_close($link);
header('Location: ../frontend/index.php')
    ?>