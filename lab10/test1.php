<?php
session_start();
if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])) {
    $userEmail = $_SESSION['user_email'];
} else {
    $userEmail = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <form method="post" action="">
    <label for="email"></label>
        <input type="email" id="email" name="email" value="<?php echo $userEmail; ?>" readonly>
        <label for="firstName"></label>
        <input type="text" id="firstName" name="firstName" required>
        

        <label for="lastName"></label>
        <input type="text" id="lastName" name="lastName" required>
        
        <button type="submit">submit</button>
    </form>

</body>
</html>
