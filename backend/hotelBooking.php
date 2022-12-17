<?php
session_start();
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$classRoom = $_GET['class'];
$price = $_GET['price'];
$id = $_SESSION['user']['id'];
$LastName = $_SESSION['user']['LastName'];
$FirstName = $_SESSION['user']['FirstName'];
$MiddleName = $_SESSION['user']['MiddleName'];
$Phone = $_SESSION['user']['Phone'];
$Email = $_SESSION['user']['Email'];
$numPeople = $_POST['persons'];
$dateStart = $_POST['dateStart'];
$dateEnd = $_POST['dateEnd'];
$numDays = (strtotime($dateEnd) - strtotime($dateStart)) / (60 * 60 * 24);
$allDaysPrice = $numDays * $price;
$query = "INSERT INTO `hotelBooking` SET idKlienta = '$id', FirstName = '$FirstName',
MiddleName = '$MiddleName', Phone = '$Phone', Email = '$Email', numPeople = '$numPeople', classRoom = '$classRoom',
Price = '$price', numDays = '$numDays', allDaysPrice = '$allDaysPrice', dateStart = '$dateStart', dateEnd = '$dateEnd'";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if ($result) {
    header('Location: ../frontend/hotel.php');
} else {
    header('Location: ../frontend/hotel.php');
}
?>