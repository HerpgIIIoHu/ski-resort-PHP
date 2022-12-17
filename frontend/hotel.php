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
    <link rel="stylesheet" href="../scss/hotel.css" />
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
    <header class="header hotel">
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
                                <h3 class="active">Отель</h3>
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
                <h1>Добро пожаловать в HOTEL EVEREST GROUP</h1>
            </div>
        </div>
    </header>
    <section class="hotels">
        <div class="container">
            <div class="hotel_block">
                <h1>Бронирование номеров в нашем отеле</h1>
                <div class="hotel_rooms">
                    <div class="room">
                        <div class="left">
                            <div class="left_part">
                                <img src="../img/hotelRooms/room1.webp" alt="">
                            </div>
                            <div class="right_part">
                                <h2 class="title">Номер с большой двуспальной кроватью</h2>
                                <h3 class="description">
                                    Стандартный номер на двух гостей.
                                    В номере имеется двуспальная кровать, которая по желанию трансформируется в две
                                    односпальные кровати, телевизор с плоским экраном и ТВ приставкой на 160 каналов,
                                    стол с двумя стульями, шкаф для одежды. Предоставляется бесплатный Wi-Fi.
                                </h3>
                                <div class="characteristic">
                                    <ul>
                                        <li>
                                            <img width="24px" height="24px" src="../img/people.png" alt="">
                                            <p>до 2 мест</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/arrow_diag.png" alt="">
                                            <p>37 кв. м</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/wifi.png" alt="">
                                            <p>Бесплатный Wi-Fi</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/check2.png" alt="">
                                            <p>Кухня</p>
                                        </li>
                                    </ul>
                                    <h3>6999 руб.</h3>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                            <div class="pay">
                                <button class="payBtn"
                                    onclick="payBtnClick('Номер с большой двуспальной кроватью', 6999)">Оплатить</button>
                            </div>
                        </div>
                    </div>

                    <div class="room">
                        <div class="left">
                            <div class="left_part">
                                <img src="../img/hotelRooms/room2.webp" alt="">
                            </div>
                            <div class="right_part">
                                <h2 class="title">Номер с двумя раздельными кроватями (Twin)</h2>
                                <h3 class="description">
                                    Номер площадью 37-41 кв. м. идеально подходит для проживания двоих гостей и
                                    предлагает две отдельные кровати и рабочую зону. Дизайнерский интерьер с
                                    использованием натуральных материалов создает уютную стильную атмосферу. В номере
                                    имеются отдельная рабочая зона и две раздельные кровати (Twin) с британским
                                    постельным бельем.
                                </h3>
                                <div class="characteristic">
                                    <ul>
                                        <li>
                                            <img width="24px" height="24px" src="../img/people.png" alt="">
                                            <p>до 2 мест</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/arrow_diag.png" alt="">
                                            <p>37 кв. м</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/wifi.png" alt="">
                                            <p>Бесплатный Wi-Fi</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/snowflake.png" alt="">
                                            <p>Кондиционер</p>
                                        </li>
                                    </ul>
                                    <h3>8999 руб.</h3>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                            <div class="pay">
                                <button class="payBtn"
                                    onclick="payBtnClick('Номер с двумя раздельными кроватями (Twin)', 8999)">Оплатить</button>
                            </div>
                        </div>
                    </div>

                    <div class="room">
                        <div class="left">
                            <div class="left_part">
                                <img src="../img/hotelRooms/room3.webp" alt="">
                            </div>
                            <div class="right_part">
                                <h2 class="title">Номер с двумя раздельными кроватями (Twin) и видом на горы</h2>
                                <h3 class="description">
                                    В номере с отдельной рабочей зоной с беспроводным доступом в интернет и двумя
                                    раздельными кроватями (Twin) с прекрасным британским хлопчатобумажным постельным
                                    бельем комфортно размещаются два человека. Стильный, и в то же время богатый
                                    интерьер подарит комфорт и спокойствие для лучшего отдыха.
                                </h3>
                                <div class="characteristic">
                                    <ul>
                                        <li>
                                            <img width="24px" height="24px" src="../img/people.png" alt="">
                                            <p>до 2 мест</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/arrow_diag.png" alt="">
                                            <p>37 кв. м</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/wifi.png" alt="">
                                            <p>Бесплатный Wi-Fi</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/snowflake.png" alt="">
                                            <p>Кондиционер</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/check2.png" alt="">
                                            <p>Балкон</p>
                                        </li>
                                    </ul>
                                    <h3>11999 руб.</h3>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                            <div class="pay">
                                <button class="payBtn"
                                    onclick="payBtnClick('Номер с двумя раздельными кроватями (Twin) и видом на горы', 11999)">Оплатить</button>
                            </div>
                        </div>
                    </div>

                    <div class="room">
                        <div class="left">
                            <div class="left_part">
                                <img src="../img/hotelRooms/room4.webp" alt="">
                            </div>
                            <div class="right_part">
                                <h2 class="title">Люкс с двусральной кроватью</h2>
                                <h3 class="description">
                                    В номере с отдельной рабочей зоной с беспроводным доступом в интернет и двумя
                                    раздельными кроватями (Twin) с прекрасным британским хлопчатобумажным постельным
                                    бельем комфортно размещаются два человека. Стильный, и в то же время богатый
                                    интерьер подарит комфорт и спокойствие для лучшего отдыха.
                                </h3>
                                <div class="characteristic">
                                    <ul>
                                        <li>
                                            <img width="24px" height="24px" src="../img/people.png" alt="">
                                            <p>до 2 мест</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/arrow_diag.png" alt="">
                                            <p>78 кв. м</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/wifi.png" alt="">
                                            <p>Бесплатный Wi-Fi</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/snowflake.png" alt="">
                                            <p>Кондиционер</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/check2.png" alt="">
                                            <p>Балкон</p>
                                        </li>
                                    </ul>
                                    <h3>15999 руб.</h3>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                            <div class="pay">
                                <button class="payBtn"
                                    onclick="payBtnClick('Люкс с двусральной кроватью', 15999)">Оплатить</button>
                            </div>
                        </div>
                    </div>

                    <div class="room">
                        <div class="left">
                            <div class="left_part">
                                <img src="../img/hotelRooms/room5.webp" alt="">
                            </div>
                            <div class="right_part">
                                <h2 class="title">Семейный люкс</h2>
                                <h3 class="description">
                                    Уютный и стильный трехкомнатный люкс площадью 133 кв.м состоит из просторной
                                    гостиной с зоной отдыха, обеденного зала и полностью оборудованной кухни.
                                    Комфортабельная спальня с большой двуспальной кроватью King (15 кв.м) с собственной
                                    ванной комнатой и гардеробной, детская комната с двумя кроватями Twin (17,7 кв.м),
                                    гостевой санузел и просторные террасы по всему периметру номера, порадуют даже самых
                                    искушенных гостей.
                                </h3>
                                <div class="characteristic">
                                    <ul>
                                        <li>
                                            <img width="24px" height="24px" src="../img/people.png" alt="">
                                            <p>до 7 мест</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/arrow_diag.png" alt="">
                                            <p>133 кв. м</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/wifi.png" alt="">
                                            <p>Бесплатный Wi-Fi</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/snowflake.png" alt="">
                                            <p>Кондиционер</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/check2.png" alt="">
                                            <p>Холодильник</p>
                                        </li>
                                    </ul>
                                    <h3>19999 руб.</h3>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                            <div class="pay">
                                <button class="payBtn" onclick="payBtnClick('Семейный люкс', 19999)">Оплатить</button>
                            </div>
                        </div>
                    </div>

                    <div class="room">
                        <div class="left">
                            <div class="left_part">
                                <img src="../img/hotelRooms/room6.webp" alt="">
                            </div>
                            <div class="right_part">
                                <h2 class="title">Дипломатический люкс</h2>
                                <h3 class="description">
                                    Расположенные на 12-13 этажах отеля Дипломатические Люксы площадью 157 кв. м.
                                    выполнены в превосходном стиле с поистине роскошным убранством и оснащены по
                                    последнему слову техники. Люксы включают в себя полностью оборудованную кухню,
                                    столовую, изысканно оформленный рабочий кабинет и гостевую ванную комнату.
                                    Просторная терраса номера позволяет гостям насладиться морским бризом и приятным
                                    видом.
                                </h3>
                                <div class="characteristic">
                                    <ul>
                                        <li>
                                            <img width="24px" height="24px" src="../img/people.png" alt="">
                                            <p>до 2 мест</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/arrow_diag.png" alt="">
                                            <p>157 кв. м</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/wifi.png" alt="">
                                            <p>Бесплатный Wi-Fi</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/snowflake.png" alt="">
                                            <p>Кондиционер</p>
                                        </li>
                                        <li>
                                            <img width="20px" height="20px" src="../img/check2.png" alt="">
                                            <p>Терасса</p>
                                        </li>
                                    </ul>
                                    <h3>25999 руб.</h3>
                                </div>

                            </div>
                        </div>
                        <div class="right">
                            <div class="pay">
                                <button class="payBtn"
                                    onclick="payBtnClick('Дипломатический люкс', 25999)">Оплатить</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="modal_hotel">
        <div class="form_block">
            <div class="modal_block">
                <img onclick="closeModalHotel()" src="../img/close.png" alt="">
                <form id="formHotel" method="post" action="../backend/hotelBooking.php">
                    <label for="persons">Введите количество персон</label>
                    <input type="number" name="persons" id="persons">
                    <label for="dateStart">Выберите дату заезда</label>
                    <input type="date" name="dateStart" id="dateStart">
                    <label for="dateStart">Выберите дату выезда</label>
                    <input type="date" name="dateEnd" id="dateEnd">
                    <button type="submit">Выбрать</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>