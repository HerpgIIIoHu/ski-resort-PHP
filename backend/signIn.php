<?php
session_start();
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$email = $_POST['email'];
$password = $_POST['psw'];
$password = md5($password . 'oius78fy8789gs9df87ysbdf887ys987fn98gf');
$query = "SELECT * FROM user WHERE Email = '$email' AND Password = '$password'";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
$user = $result->fetch_assoc();

if (count($user) == 0) {
    $_SESSION['message'] = "Неверно введен логин или пароль";
    echo 'Неверно введен логин или пароль';
    header('Location: ./frontend/login.php');
} else {
    echo "Вход выполнен успешно";
    $_SESSION['user'] = $user;
    header('Location: ../frontend/index.php');
}
mysqli_close($link);
?>