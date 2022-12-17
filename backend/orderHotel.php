<?php
session_start();
$state = $_GET['state'];
$id = $_GET['id'];
echo $state;
echo $id;
if ($state == 1) {
    require_once '../backend/connect.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query1 = "SELECT * FROM hotelBooking WHERE id = '$id'";
    $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));

    $booking = $result1->fetch_assoc();

    // $id = $booking['id'];
    $idKlienta = $booking['idKlienta'];
    $FirstName = $booking['FirstName'];
    $LastName = $booking['LastName'];
    $MiddleName = $booking['MiddleName'];
    $Phone = $booking['Phone'];
    $Email = $booking['Email'];
    $numPeople = $booking['numPeople'];
    $classRoom = $booking['classRoom'];
    $Price = $booking['Price'];
    $numDays = $booking['numDays'];
    $allDaysPrice = $booking['allDaysPrice'];
    $dateStart = $booking['dateStart'];
    $dateEnd = $booking['dateEnd'];
    $res = true;

    $query2 = "DELETE FROM hotelBooking WHERE id = '$id'";
    $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));

    $query3 = "INSERT INTO historyBooking SET idKlienta = '$idKlienta', LastName = '$LastName',
    FirstName = '$FirstName', MiddleName = '$MiddleName', Persons = '$numPeople',
    Phone = '$Phone', Email = '$Email', state = '$res', dateStart = '$dateStart',dateEnd = '$dateEnd', 
    Price = '$Price', allDaysPrice = '$allDaysPrice', numDays = '$numDays', classRoom = '$classRoom'";

    $result3 = mysqli_query($link, $query3) or die("Ошибка " . mysqli_error($link));
    header('Location: ../frontend/orders.php');
} else {
    require_once '../backend/connect.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query1 = "SELECT * FROM hotelBooking WHERE id = '$id'";
    $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));

    $booking = $result1->fetch_assoc();

    // $id = $booking['id'];
    $idKlienta = $booking['idKlienta'];
    $FirstName = $booking['FirstName'];
    $LastName = $booking['LastName'];
    $MiddleName = $booking['MiddleName'];
    $Phone = $booking['Phone'];
    $Email = $booking['Email'];
    $numPeople = $booking['numPeople'];
    $classRoom = $booking['classRoom'];
    $Price = $booking['Price'];
    $numDays = $booking['numDays'];
    $allDaysPrice = $booking['allDaysPrice'];
    $dateStart = $booking['dateStart'];
    $dateEnd = $booking['dateEnd'];
    $res = false;

    $query2 = "DELETE FROM hotelBooking WHERE id = '$id'";
    $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));

    $query3 = "INSERT INTO historyBooking SET idKlienta = '$idKlienta', LastName = '$LastName',
    FirstName = '$FirstName', MiddleName = '$MiddleName', Persons = '$numPeople',
    Phone = '$Phone', Email = '$Email', state = '$res', dateStart = '$dateStart',dateEnd = '$dateEnd', 
    Price = '$Price', allDaysPrice = '$allDaysPrice', numDays = '$numDays', classRoom = '$classRoom'";

    $result3 = mysqli_query($link, $query3) or die("Ошибка " . mysqli_error($link));
    header('Location: ../frontend/orders.php');
}
?>