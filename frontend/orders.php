<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../scss/style.css" />
    <link rel="stylesheet" href="../scss/orders.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet" />
    <script src="../js/index.js"></script>
    <title>Горнолыжный комплекс Эверест</title>
</head>

<body>
    <header class="header order">
        <div class="container">
            <div class="header_info">
                <div class="logo_header">
                    <a href="./index.php"><img width="60px" height="60px" src="../img/Слой 0.png" alt="logotype" /></a>
                    <a href="./index.php">
                        <h2>Горнолыжный курорт Эверест</h2>
                    </a>
                </div>
                <div class="header_menu">
                    <ul>
                        <li>
                            <a href="./prokat.php">
                                <h3>Прокат</h3>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="./location.php">
                                <h3>Как добраться</h3>
                            </a>
                        </li> -->
                        <li>
                            <a href="./hotel.php">
                                <h3>Отель</h3>
                            </a>
                        </li>
                        <li>
                            <a href="./info.php">
                                <h3>Информация</h3>
                            </a>
                        </li>
                        <?php if (!$_SESSION['user']) {
                            echo '
                            <li>
                                <a href="./login.php" class="btn_login"><h3>Вход</h3></a>
                            </li>
                            <li>
                                <a href="./register.php" class="btn_reg"><h3>Регистрация</h3></a>
                            </li>';
                        } else {
                            if ($_SESSION['user']['type'] == 1) {
                                echo '
                           <li>
                                <a href="./orders.php"><h3 class=active>Бронь туров</h3></a>
                            </li>';
                            }
                            echo '<li><a href="#" class="user"><img width="21px" height="21px" src="../img/user2.png" /><h3>
                            ' . $_SESSION['user']['FirstName'] . '</h3></a></li>
                          <li ><a href="#" onclick="logout()" class="logout"><h3>Выход</h3></a></li>
                          ';
                        }
                        ?>
                        <!-- <li>
                            <div class="call">
                                <img width="19px" height="19px" src="../img/call.png" alt="" />
                                <a href="tel:79999999999">
                                    <h3>+7 (999)-999-9999</h3>
                                </a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="orders">
        <div class="container">
            <div class="orders_block">
                <?php
                require_once '../backend/connect.php';
                $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                if ($_SESSION['user']['type'] == 1) {
                    $query = "SELECT * FROM bronirovanieTura";
                    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                    if ($result && mysqli_num_rows($result) > 0) {

                        echo '<center><table>';
                        echo '<tr> 
                        <th>Id</th>
                        <th>Id клиента</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Телефон</th>
                        <th>E-mail</th>
                        <th>Номер тура</th>
                        <th>Цена</th>
                        <th>Дата</th>
                        <th>Закрыть заявку</th>
                        </tr>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td><b>' . $row['id'] . '</b></td>';
                            echo '<td><b>' . $row['idKlienta'] . '</b></td>';
                            echo '<td><b>' . $row['FirstName'] . '</b></td>';
                            echo '<td><b>' . $row['MiddleName'] . '</b></td>';
                            echo '<td><b><a href=tel:' . $row['Phone'] . '>' . $row['Phone'] . '</a></b></td>';
                            echo '<td><b><a href=mailto:' . $row['Email'] . '>' . $row['Email'] . '</a></b></td>';
                            echo '<td><b>' . $row['numberTur'] . '</b></td>';
                            echo '<td><b>' . $row['price'] . ' руб.</b></td>';
                            echo '<td><b>' . $row['date'] . '</b></td>';
                            echo '<td><button class=btn value=' . $row['id'] . ' onclick=closeOrder()>Закрыть заявку</button></td>';
                            echo '</tr>';
                        }
                        echo '<center><table>';
                    }
                    mysqli_close($link);
                }
                ?>
            </div>
        </div>
    </section>
</body>


</html>