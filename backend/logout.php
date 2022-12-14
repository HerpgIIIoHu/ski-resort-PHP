<?php
session_start();
unset($_SESSION['user']);
header('Location: ../frontend/login.php')
    ?>