<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="../scss/prokat.css" />
    <script src="../js/index.js"></script>
    <title>Горнолыжный комплекс Эверест</title>
</head>

<body>
    <header class="header prokat">
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
                                <h3 class='active'>Прокат</h3>
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
                                echo ' <div class="call">
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
            <div class="banner_text prokat">
                <h1>Прокат горнолыжного инвентаря, по низким ценнам</h1>
            </div>
        </div>
    </header>
    <section class="inventar">
        <div class="container">
            <div class="all_inventar">
                <h1>Все оборудование</h1>
                <div class="type_sky">
                    <h2>Лыжи</h2>
                    <div class="cards_sky">
                        <?php
                        require_once '../backend/connect.php';
                        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                        $query = "SELECT * FROM inventarSki";
                        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="sky">
                            <div class="top_card">
                                <h2>' . $row['title'] . '</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                    <img src=' . $row['imgUrl'] . ' alt="" />
                                </div>
                                <div class="right">
                                    <h2>' . $row['name'] . '</h2>
                                    <p>' . $row['description'] . '</p>
                                    <h2 style="margin-top: 155px">от ' . $row['salePrice'] . ' руб / день</h2>
                                    <h3>' . $row['price'] . ' руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>';
                            }
                        }
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
                <div class="type_sky">
                    <h2>Сноуборды</h2>
                    <div class="cards_sky">
                        <?php
                        require_once '../backend/connect.php';
                        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                        $query = "SELECT * FROM inventarBord";
                        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="sky">
                            <div class="top_card">
                                <h2>' . $row['title'] . '</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                    <img src=' . $row['imgUrl'] . ' alt="" />
                                </div>
                                <div class="right">
                                    <h2>' . $row['name'] . '</h2>
                                    <p>' . $row['description'] . '</p>
                                    <h2 style="margin-top: 155px">от ' . $row['salePrice'] . ' руб / день</h2>
                                    <h3>' . $row['price'] . ' руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>';
                            }
                        }
                        mysqli_close($link);
                        ?>
                    </div>
                </div>
                <!-- <div class="type_sky">
                    <h2>Лыжи</h2>
                    <div class="cards_sky">
                        <div class="sky">
                            <div class="top_card">
                                <h2>Горные лыжи Comfort</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                    <img src="../img/sky1.png.webp" alt="" />
                                </div>
                                <div class="right">
                                    <h2>Pursuit</h2>
                                    <p>
                                        Бестселлер от Росси, карвинговые лыжи для начинающих с деревянным
                                        наконечником. Прощают многие ошибки и позволяют прогрессировать быстро!
                                    </p>
                                    <h2 style="margin-top: 155px">от 880 руб / день</h2>
                                    <h3>1100 руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>

                        <div class="sky">
                            <div class="top_card">
                                <h2>Горные лыжи Comfort</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                    <img src="../img/sky2.png.webp" alt="" />
                                </div>
                                <div class="right">
                                    <h2>Performer</h2>
                                    <p>
                                        Легендарные лыжи для любителей, можно встретить на лучших европейских
                                        курортах. Идеально для прогрессирующих лыжников.
                                    </p>
                                    <h2 style="margin-top: 178px">от 880 руб / день</h2>
                                    <h3>1100 руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>

                        <div class="sky">
                            <div class="top_card">
                                <h2>Горные лыжи Comfort</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                    <img src="../img/sky3.jpg.webp" alt="" />
                                </div>
                                <div class="right">
                                    <h2 class="title">X-drive</h2>
                                    <p>
                                        Легкие в управлении лыжи для катания по любым склонам. Отличный выбор для
                                        начинающих лыжников любого возраста.
                                    </p>
                                    <h2 style="margin-top: 200px">от 880 руб / день</h2>
                                    <h3 class="price">1100 руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>

                        <div class="sky premium">
                            <div class="top_card">
                                <h2>Горные лыжи Premium</h2>
                            </div>
                            <div class="card_text">
                                <div class="left">
                                    <img src="../img/sky4.jpg.webp" alt="" />
                                </div>
                                <div class="right">
                                    <h2 class="title">Racetiger SC</h2>
                                    <p>
                                        Хайтек слаломные лыжи, позволяют совершать быстрые и мощные виражи, не лишая
                                        лыжника комфорта. Новая система виброгашения справляется с вибрациям на 100%.
                                    </p>
                                    <h2 style="margin-top: 130px">от 2080 руб / день</h2>
                                    <h3 class="price">2600 руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>

                        <div class="sky premium">
                            <div class="top_card">
                                <h2>Горные лыжи Premium</h2>
                            </div>
                            <div class="card_text">
                                <div class="left">
                                    <img src="../img/sky5.png.webp" alt="" />
                                </div>
                                <div class="right">
                                    <h2 class="title">Power Instinct</h2>
                                    <p>
                                        Лучшая супер-универсальная модель для трассы: быстрая перекантовка, цепкость,
                                        чистое ведение, дает повышенную проходимость. Легкость на ногах и высокая
                                        маневренность!
                                    </p>
                                    <h2 style="margin-top: 130px">от 2080 руб / день</h2>
                                    <h3 class="price">2600 руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>

                        <div class="sky premium">
                            <div class="top_card">
                                <h2>Горные лыжи Premium</h2>
                            </div>
                            <div class="card_text">
                                <div class="left">
                                    <img src="../img/sky6.jpg.webp" alt="" />
                                </div>
                                <div class="right">
                                    <h2 class="title">Vantage 77 x</h2>
                                    <p>
                                        Лыжи для любителей скорости, стабильности и вездеходности. Усилены титаналом
                                        для стабильности на скорости и супер сцепления на жестком склоне, в условиях
                                        свежего снега и бугров.
                                    </p>
                                    <h2 style="margin-top: 130px">от 2080 руб / день</h2>
                                    <h3 class="price">2600 руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="type_sky">
                    <h2>Сноуборды</h2>
                    <div class="cards_sky">
                        <div class="sky">
                            <div class="top_card">
                                <h2>Сноуборды Comfort</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                    <img src="../img/snouwb.png.webp" alt="" />
                                </div>
                                <div class="right">
                                    <h2>Rental</h2>
                                    <p>
                                        Прокатные сноуборды от мейнстрим бренда. Удобные и легкие в управлении доски,
                                        подойдут любому любителю и начинающим райдерам!
                                    </p>
                                    <h2 style="margin-top: 155px">от 880 руб / день</h2>
                                    <h3>1100 руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>
                        <div class="sky">
                            <div class="top_card">
                                <h2>Сноуборды Comfort</h2>
                            </div>

                            <div class="card_text">
                                <div class="left">
                                    <img src="../img/snouwb2.png.webp" alt="" />
                                </div>
                                <div class="right">
                                    <h2>Rental</h2>
                                    <p>
                                        Отличный снаряд для начинающих! С ним падений на копчик будет меньше и
                                        уверенность придет к тебе быстро, проверено тысячами сноубордистов!
                                    </p>
                                    <h2 style="margin-top: 155px">от 880 руб / день</h2>
                                    <h3>1100 руб. / день</h3>
                                    <button>Выбрать<img width="20px" src="./img/arrow(2).png" alt="" /></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</body>

</html>