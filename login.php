<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    session_start();

    $user = $result->fetch_assoc();

    if ($user) {
       if ( $_POST["password"] == $user["password"]){

        session_start();

        $_SESSION["user_id"] = $user["id"];

        header("Location: site.html");

       } 
    }

    $is_invalid = true;  
    
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <script src="kien.js"></script>
</head>
<body>
    <header>
        <nav>  
           <a href="http://127.0.0.1:5501/homepage.html" class="aimage"><img src="https://as2.ftcdn.net/v2/jpg/02/01/05/41/1000_F_201054174_pST9odUCoM5cU33E4EQhHAbirqG94ZFk.jpg" alt="" class="a-image"></a>
            <ul>
                <li><a href="http://127.0.0.1:5501/homepage.html">Home</a></li>
                <li><a href="http://127.0.0.1:5501/aboutme.html">About Me</a></li>
            </ul>
        </nav>
        <div class="register">
        <button onclick ="goRegister()">Register >></button><i class="ri-arrow-right-double-line"></i>
    </div>
    </header>
    <form action="" method="post">
    <div class="container">
        <h1>LOGIN</h1>
        <div class="">Email</div>
        <input id="input-username" type="username" placeholder="Email" name="email">
        <div class="password">Password</div>
        <input id="input-password" type="password" placeholder="Password" name="password">
        <button id="login">Login</button>

        
    </div>
</form>
</body>
</html>