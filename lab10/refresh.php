<?php
session_start();
if (!isset($_SESSION['refresh_count'])) {
    $_SESSION['refresh_count'] = 0;
    echo "You have not already restarted this page";
} else {
    $_SESSION['refresh_count']++;
    echo "You have restarted this page ".$_SESSION['refresh_count']." time(s).";
}
?>

