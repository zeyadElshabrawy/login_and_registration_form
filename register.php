<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];
    $dublicate = mysqli_query($conn, "SELECT * FROM users WHERE full_name='$name' or email='$email'");
    if (mysqli_num_rows($dublicate) > 0) {
        echo
        "<script> alert('user name or email has already taken');</script>";
    } else {
        if ($password == $repeat_password) {
            $query = "INSERT INTO users VALUES('','$name','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Register Succesfully');</script>";
        } else {
            echo
            "<script> alert('password doesnt match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../logIn_and_register/style/style.css" />
    <meta charset="UTF-8" />
    <title>Register</title>
</head>

<body>
    <form action="" class="form" method="post">
        <div class="box">
            <h1>register</h1>
            <div class="content">
                <input type="text" name="name" id="name" class="inputs" placeholder="your name" />
                <input type="email" name="email" id="email" class="inputs" placeholder="email" />
                <input type="password" name="password" id="password" class="inputs" placeholder="password" />
                <input type="password" name="repeat_password" id="repeat_password" class="inputs" placeholder="repeat_password" />
                <input type="submit" name="submit" value="register" class="buttons">
            </div>
            <span>already have an account</span>
            <a href="login.php">LogIn</a>
        </div>
    </form>
</body>

</html>