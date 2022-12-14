<?php
session_start();
require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$LastName = filter_var(trim($_POST['LastName']));

$FirstName = filter_var(trim($_POST['FirstName']));
$MiddleName = filter_var(trim($_POST['MiddleName']));
$Email = $_POST['email'];
$Date = filter_var(trim($_POST['date']));
$pass = filter_var(trim($_POST['psw']));
$pass = md5($pass . 'oius78fy8789gs9df87ysbdf887ys987fn98gf');

$pass2 = filter_var(trim($_POST['pswTwo']));
$pass2 = md5($pass2 . 'oius78fy8789gs9df87ysbdf887ys987fn98gf');
$phone = filter_var(trim($_POST['phone']));
if ($LastName == '') {
    echo 'Вы не ввели фамилию';
    $_SESSION['RegErr'] = 'Вы не ввели фамилию';
    header('Location: ../frontend/register.php');
} else {
    if ($FirstName == '') {
        echo 'Вы не ввели имя';
        $_SESSION['RegErr'] = 'Вы не ввели имя';
        header('Location: ../frontend/register.php');

    } else {
        if ($MiddleName == '') {
            echo 'Вы не ввели Отчество';
            $_SESSION['RegErr'] = 'Вы не ввели Отчество';
            header('Location: ../frontend/register.php');
        } else {
            if ($Date == '') {
                echo 'Вы не ввели <b></b>';
                $_SESSION['RegErr'] = 'Вы не ввели Дату рождения';
                header('Location: ../frontend/register.php');
            } else {
                if (mb_strlen($Email) < 9 || mb_strlen($Email) > 100) {
                    echo 'Недопустимая длина E-mail!!!';
                    $_SESSION['RegErr'] = 'Недопустимая длина E-mail!!!';
                    header('Location: ../frontend/register.php');
                } else {
                    if ($phone == '' && mb_strlen($phone) != 12) {
                        $_SESSION['RegErr'] = 'Некорректый номер телефона';
                        header('Location: ../frontend/register.php');
                    } else {
                        if ($pass == '') {
                            echo 'Вы не ввели Пароль';
                            $_SESSION['RegErr'] = 'Вы не ввели Пароль';
                            header('Location: ../frontend/register.php');
                        } else {
                            if ($pass2 == '') {
                                echo 'Вы не поддтвердили Пароль';
                                $_SESSION['RegErr'] = 'Вы не поддтвердили Пароль';
                                header('Location: ../frontend/register.php');
                            } else {
                                if ($pass == $pass2) {
                                    $query1 = "SELECT * FROM user WHERE Phone = '$phone' OR Email = '$Email'";
                                    $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
                                    $user = $result1->fetch_assoc();
                                    if (count($user) == 0) {
                                        $query = "INSERT INTO `user` SET LastName = '$LastName', FirstName = '$FirstName', MiddleName = '$MiddleName',
                                    `date` = '$Date', Email = '$Email', Password = '$pass', Phone = '$phone'";
                                        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                                        if ($result) {
                                            echo 'Данные успешно внесены в БД';
                                            header('Location: ../frontend/register.php');
                                        } else {
                                            echo "Пользователь с таким номером телефона или E-mail сущевствует";
                                            $_SESSION['RegErr'] = 'Пользователь с таким номером телефона или E-mail сущевствует';
                                            header('Location: ../frontend/register.php');
                                        }
                                        mysqli_close($link);
                                        header('Location: ../frontend/login.php'); //Переход назад на главную страничку
                                    } else {
                                        $_SESSION['RegErr'] = 'Пользователь с таким номером телефона или E-mail сущевствует';
                                        header('Location: ../frontend/register.php');
                                    }

                                } else {
                                    echo 'Пароли не совпвдвют';
                                    $_SESSION['RegErr'] = 'Пароли не совпвдвют';
                                    header('Location: ../frontend/register.php');
                                }
                            }

                        }
                    }


                }

            }
        }
    }
}




?>