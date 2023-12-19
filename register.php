<?php

$is_success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";

    $stmt = $mysqli->stmt_init();

    if ( ! $stmt->prepare($sql)){
        die("SQL error: ". $mysqli->error);
    }

    $stmt->bind_param("sss",
                        $_POST["name"],
                        $_POST["email"],
                        $_POST["password"]);

    if ($stmt->execute()){
        $is_success = true;
        header ("location: login.php");
    }
    else{
        die($mssqli->error. " " . $mysqli->errno);
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
    <script src="kien.js"></script>
</head>
<body>
    <a href="http://127.0.0.1:5501/homepage.html" class="aimage"><img class="imahe" src="https://as2.ftcdn.net/v2/jpg/02/01/05/41/1000_F_201054174_pST9odUCoM5cU33E4EQhHAbirqG94ZFk.jpg"></a>
    <form class="login-container register-container" id="signup" method="post">
        <h1>REGISTER</h1>
        <input type="text" name="name" id="username2" autocomplete="off" placeholder="Full Name">
        <input type="text" name="email" id="Last Name" autocomplete="off" placeholder="Email">
        <input type="password" name="password" id="password2" autocomplete="off" placeholder="Password">
        <input type="password" id="password2" autocomplete="off" placeholder="Confirm Password">
        <button>Sign Up</button>
        <p href="http://localhost/ken/login.php" class="link" onclick="">Already Have An Account? Log In Here</p>
    </form>
</body>
</html>