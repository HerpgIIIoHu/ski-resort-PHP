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
    <header class="header">
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
                <h1>ПОКОРИ ВЕРШИНЫ</h1>
                <h3>Горнолыжного курорта Эверест</h3>
            </div>
        </div>
    </header>
    <section class="info_cards">
        <div class="container">
            <div class="cards">
                <a id="card1" class="card" href="./prokat.php">
                    <h2>Прокат инвентаря</h2>
                </a>
                <a id="card2" class="card" href="">
                    <h2>Как добраться</h2>
                </a>
                <a id="card3" class="card" href="">
                    <h2>Отель</h2>
                </a>
                <a id="card4" class="card" href="">
                    <h2>Обучение с инструктором</h2>
                </a>
                <a id="card5" class="card" href="">
                    <h2>Детям</h2>
                </a>
                <a id="card6" class="card" href="">
                    <h2>О нас</h2>
                </a>
            </div>
        </div>
    </section>
    <section class="safety">
        <div class="container">
            <h1>Мы сделаем ваш отдых безопасным</h1>
            <div class="cards">
                <div class="card">
                    <div class="icon_safety">
                        <img width="80px" height="80px" src="../img/ambulance.png" alt="" />
                    </div>
                    <div class="text_safety">
                        <h3>Круглосуточная помощь</h3>
                        <p>На нашем курорте вы будуте в безопасности</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon_safety">
                        <img width="80px" height="80px" src="../img/skyer.png" alt="" />
                    </div>
                    <div class="text_safety">
                        <h3>Дежурный патруль</h3>
                        <p>На нашем курорте вы будуте в безопасности</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon_safety">
                        <img width="80px" height="80px" src="../img/helicopter.png" alt="" />
                    </div>
                    <div class="text_safety">
                        <h3>Вертолет скорой помощи</h3>
                        <p>На нашем курорте вы будуте в безопасности</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery">
        <div class="container">
            <div class="container_photo">
                <h1>Галлерея</h1>
                <div class="all_photo">
                    <?php
                    require_once '../backend/connect.php';
                    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
                    $query = "SELECT * FROM gallery";
                    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                            <div class="card_photo">
                                <img src=' . $row['imgUrl'] . ' alt="" />
                            </div>';
                        }
                    }
                    mysqli_close($link);
                    ?>
                </div>
                <?php
                if ($_SESSION['user']) {
                    echo '
                        <div class="add_photo">
                            <form method="post" action="../backend/addGallery.php" enctype="multipart/form-data">
                                <input type="file" name=addPhoto>
                                <button type="submit">Добавить в галлерею</button>
                            </form>
                        </div>
                        ';
                }
                ?>
                <p>Больше фото в <a href="https://instagram.com/" target="_blank">инстаграм.</a></p>
                <p>
                    Запечатли себя на курорте под нашим тегом
                    <a href="https://instagram.com/" target="_blank">#everestGroup</a>
                </p>
            </div>
        </div>
    </section>
    <section class="services_company">
        <div class="container">
            <div class="services">
                <h1>Пакет услуг на выбор</h1>
                <div class="cards_servises">
                    <div class="card card1">
                        <h2>Эконом тур</h2>
                        <ul>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Траноспорт из городов партнерв</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>50 подъемов бесплатно</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Проживание</p>
                            </li>
                            <li class="not_included">
                                <p>Питание (завтрак, обед, ужин)</p>
                            </li>
                            <li class="not_included">
                                <p>Экскурсия на выбор</p>
                            </li>
                            <li class="not_included">
                                <p>1 тренировка инструктора</p>
                            </li>
                        </ul>
                        <h3>9990 руб.</h3>
                        <div class="button">
                            <button class="button_card" href="#" onclick="buyTur(<?php if ($_SESSION['user'])
                                echo $_SESSION['user'];
                            else
                                echo 0; ?>, 1, 9990)">
                                Мне это подходит
                            </button>
                        </div>
                    </div>
                    <div class="card card2">
                        <h2>Покушать тур</h2>
                        <ul>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Траноспорт из городов партнерв</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>50 подъемов бесплатно</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Проживание</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Питание (завтрак, обед, ужин)</p>
                            </li>
                            <li class="not_included">
                                <p>Экскурсия на выбор</p>
                            </li>
                            <li class="not_included">
                                <p>1 тренировка инструктора</p>
                            </li>
                        </ul>
                        <h3>12990 руб.</h3>
                        <div class="button">
                            <button class="button_card" href="#" onclick="buyTur(<?php if ($_SESSION['user'])
                                echo $_SESSION['user'];
                            else
                                echo 0; ?>, 1, 9990)">
                                Мне это подходит
                            </button>
                        </div>
                    </div>
                    <div class="card card3">
                        <h2>Все включено!</h2>
                        <ul>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Траноспорт из городов партнерв</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>50 подъемов бесплатно</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Проживание</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Питание (завтрак, обед, ужин)</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>Экскурсия на выбор</p>
                            </li>
                            <li class="enabled">
                                <img width="18px" height="18px" src="../img/check.png" alt="check" />
                                <p>1 тренировка инструктора</p>
                            </li>
                        </ul>
                        <h3>15990 руб.</h3>
                        <div class="button">
                            <button class="button_card" href="#" onclick="buyTur(<?php if ($_SESSION['user'])
                                echo $_SESSION['user'];
                            else
                                echo 0; ?>, 1, 9990)">
                                Мне это подходит
                            </button>
                        </div>
                    </div>
                </div>
                <h3>Для детей до 12 лет действует скидка 20%</h3>
            </div>
        </div>
    </section>

    <section class="modal none">
        <img width="16px" src="./img/close_btn.png" onclick="closeModal()" alt="" />
        <div class="full_modal">
            <form class="form_modal" action="">
                <input type="text" placeholder="Введите имя" />
                <input type="tel" placeholder="Телефон" />
                <input type="email" placeholder="Email" />
                <button type="submit">Отправить</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="content">
                <h1>Как нас найти</h1>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1125.8757648766334!2d86.92425037724736!3d27.988190699466678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e854a215bd9ebd%3A0x576dcf806abbab2!2z0JTQttC-0LzQvtC70YPQvdCz0LzQsA!5e0!3m2!1sru!2sru!4v1670329061269!5m2!1sru!2sru"
                    width="1400" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="bottom">
                    <h4>©Copyright 2022 by Kolupaev Konstantin</h4>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>