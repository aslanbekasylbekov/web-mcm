<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
function getCurrentTime() {
    return time();
}
function formatTimeDifference($time) {
    $currentTime = getCurrentTime();
    $difference = $currentTime - $time;

    if ($difference < 60) {
        return $difference . " seconds ago";
    } elseif ($difference < 3600) {
        $minutes = floor($difference / 60);
        return $minutes . " minutes ago";
    } else {
        $hours = floor($difference / 3600);
        return $hours . " hours ago";
    }
}

if (isset($_SESSION['login_time'])) {
    $loginTime = $_SESSION['login_time'];
    echo "You logged in " . formatTimeDifference($loginTime);
} else {
    $_SESSION['login_time'] = getCurrentTime();
    echo "Welcome! You just logged in.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
        <h1>Scada</h1>
        <p>Supervisory control and data acquisition (SCADA) is a control system architecture comprising computers, networked data communications and graphical user interfaces for high-level supervision of machines and processes. It also covers sensors and other devices, such as programmable logic controllers, which interface with process plant or machinery.</p>
        <a href="logout.php" class="btn btn-warning">Logout</a>
</body>
</html>