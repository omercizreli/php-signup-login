<?php
error_reporting(0);
session_start();

if(isset($_SESSION["user_id"])){
    $mysqli=require "database.php";
    $sql="SELECT*FROM user WHERE id={$_SESSION['user_id']}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
</head>
<body>
    <h1>Home</h1>
    <?php if($user):?>

        <P>Hello <?= htmlspecialchars($user['name'])?></P>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <p><a href="login.php">Login</a> or <a href="sign_up.html">Sign Up</a></p>    
    <?php endif; ?>

    
</body>
</html>