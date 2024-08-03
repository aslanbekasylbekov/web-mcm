<?php
session_start();
if (isset($_SESSION['user_country']) && !empty($_SESSION['user_country'])) {
    $userCountry = $_SESSION['user_country'];
    $userName = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
</head>
<body>

    <?php echo $userName; ?> <?php echo $userCountry;?>
</body>
</html>
