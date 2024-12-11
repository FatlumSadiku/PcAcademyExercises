<?php
session_start();

setcookie('gamesPlayed', 0, time()+86400, '/');

session_destroy();
header("Location: index.php");
exit();