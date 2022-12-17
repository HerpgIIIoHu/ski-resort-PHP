<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="../scss/style.css" />
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
    <header class="header info">
        <div class="container">
            <div class="header_info">
                <div class="logo_header">
                    <a href="./index.php"><img width="60px" height="60px" src="../img/logo.png" alt="logotype" /></a>
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
                        <li>
                            <a href="./hotel.php">
                                <h3>Отель</h3>
                            </a>
                        </li>
                        <li>
                            <a href="./info.php">
                                <h3 class="active">Информация</h3>
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
                                <a href="./orders.php"><h3>Бронь</h3></a>
                            </li>';
                            }
                            echo '<li><a href="#" class="user"><img width="21px" height="21px" src="../img/user4.png" /><h3>
                            ' . $_SESSION['user']['FirstName'] . '</h3></a></li>
                          <li ><a href="#" onclick="logout()" class="logout"><h3>Выход</h3></a></li>
                          ';
                        }
                        ?>

                        <!-- <li>
                            <?php
                            if (!$_SESSION['user']) {
                                echo '<div class="call">
                                    <img width="19px" height="19px" src="../img/call.png" alt="" />
                                    <a href="tel:79999999999">
                                        <h3>+7 (999)-999-9999</h3>
                                    </a>
                                </div>';
                            }
                            ?>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="banner_text">
                <h1>Как вам нас найти и связаться?</h1>
                <h3>Все просто! Читайте информацию ниже</h3>
            </div>
        </div>
    </header>
    <section class="information">
        <div class="container">
            <div class="info_block">

            </div>
        </div>
    </section>
</body>

</html>