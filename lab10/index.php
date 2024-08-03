<?php 
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['country']) && (!empty($_POST['country']))){
        $_SESSION['user_country'] = $_POST['country'];
        $_SESSION['username'] = $_POST['name'];
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select a country</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="name">
        <select name="country">
            <option value="select">(Select a country)</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Argentina">Argentina</option>
            <option value="England">England</option>
            <option value="America">America</option>
            <option value="Wales">Wales</option>
            <option value="Russia">Russia</option>
            <option value="Ukraine">Ukraine</option>
            <option value="China">China</option>
        </select>
        <input type="submit" value="submit">
    </form>
    <p>Go to <a href="test.php">test.php</a></p>
</body> 
</html>