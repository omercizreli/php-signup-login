<?php
$is_invalid=false;
if($_SERVER["REQUEST_METHOD"] === 'POST'){
    $mysqli=require 'database.php';
    $sql=sprintf("SELECT*FROM user WHERE email='%s'",$mysqli->real_escape_string($_POST['email']));
    $result=$mysqli->query($sql);
    $user=$result->fetch_assoc();
    
    if($user){
        if(password_verify($_POST['password'],$user['password_hash'])){
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"]=$user["id"];
            header("Location: index1.php");
            exit;
        }
        
    }
    $is_invalid=true;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if($is_invalid):?>
        <em>Invalid Login<em>
    <?php endif;?>        
    <form action="" method="post">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= htmlspecialchars($_POST['email'] ?? "" )?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <button>Login</button>
    </form>
</body>
</html>