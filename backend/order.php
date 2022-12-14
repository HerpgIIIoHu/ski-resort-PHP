<?php
session_start();
$state = $_GET['state'];
$id = $_GET['id'];
echo $state;
echo $id;
if ($state == 1) {
    require_once '../backend/connect.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query1 = "SELECT * FROM bronirovanieTura WHERE id = '$id'";
    $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));

    $zakaz = $result1->fetch_assoc();

    $idKlienta = $zakaz['idKlienta'];
    $FirstName = $zakaz['FirstName'];
    $LastName = $zakaz['LastName'];
    $MiddleName = $zakaz['MiddleName'];
    $Phone = $zakaz['Phone'];
    $Email = $zakaz['Email'];
    $date = date('Y/m/d');
    $res = true;
    $numberTur = $zakaz['numberTur'];
    $price = $zakaz['price'];

    $query2 = "DELETE FROM bronirovanieTura WHERE id = '$id'";
    $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));

    $query3 = "INSERT INTO historySales SET idKlienta = '$idKlienta', LastName = '$LastName',
    FirstName = '$FirstName', MiddleName = '$MiddleName', numberTur = '$numberTur',
    Phone = '$Phone', Email = '$Email', result = '$res', date = '$date', price = '$price'";
    $result3 = mysqli_query($link, $query3) or die("Ошибка " . mysqli_error($link));
    header('Location: ../frontend/orders.php');
} else {
    require_once '../backend/connect.php';
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $query1 = "SELECT * FROM bronirovanieTura WHERE id = '$id'";
    $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));

    $zakaz = $result1->fetch_assoc();

    $idKlienta = $zakaz['idKlienta'];
    $FirstName = $zakaz['FirstName'];
    $LastName = $zakaz['LastName'];
    $MiddleName = $zakaz['MiddleName'];
    $Phone = $zakaz['Phone'];
    $Email = $zakaz['Email'];
    $date = date('Y/m/d');
    $res = false;
    $numberTur = $zakaz['numberTur'];
    $price = $zakaz['price'];

    $query2 = "DELETE FROM bronirovanieTura WHERE id = '$id'";
    $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));

    $query3 = "INSERT INTO historySales SET idKlienta = '$idKlienta', LastName = '$LastName',
    FirstName = '$FirstName', MiddleName = '$MiddleName', numberTur = '$numberTur',
    Phone = '$Phone', Email = '$Email', result = '$res', date = '$date', price = '$price'";
    $result3 = mysqli_query($link, $query3) or die("Ошибка " . mysqli_error($link));
    header('Location: ../frontend/orders.php');
}
?>