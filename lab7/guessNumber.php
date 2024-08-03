<?php
session_start();

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 3;
    $_SESSION['number_to_guess'] = rand(1, 7);
}

$user_guess = $_POST['number'];
$attempts = $_SESSION['attempts'];

if ($user_guess == $_SESSION['number_to_guess']) {
    echo "You win!";
    session_destroy();
} else {
    echo "Wrong.";
    $attempts--;

    if ($attempts > 0) {
        echo " You have $attempts attempts remaining.";
        $_SESSION['attempts'] = $attempts;
        header("refresh:10;url=guessNumber.html");
    } else {
        echo "GAME OVER!";
        session_destroy(r);
    }
}
?>