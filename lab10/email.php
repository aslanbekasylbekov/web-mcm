<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $_SESSION['user_email'] = $_POST['email'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
</head>
<body>
    <form method="post" action="">
        <label for="email"></label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Submit</button>
    </form>
    <p>Go to <a href="test1.php">test1.php</a></p>
</body>
</html>
