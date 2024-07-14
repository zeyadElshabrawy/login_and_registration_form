<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $nameOrname = $_POST["emailOrname"];
    // $email = $_POST["email"];
    $password = $_POST["password"];
    $result=mysqli_query($conn,"SELECT * FROM users WHERE full_name ='$nameOrname' OR email ='$nameOrname'");
    $row =mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result)>0) {
        if ($password == $row["password"]) {
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            echo
            "<script> alert('logedin Succesfully');</script>";
            header("location:index.php");
        }
        else {
            echo
        "<script> alert('wrong password');</script>";
        }
    }
    else {
        echo
    "<script> alert('user Nor Registered');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../logIn_and_register/style/style.css" />
    <meta charset="UTF-8" />
    <title>login</title>
</head>

<body>
    <form action="" class="form" method="post">
        <div class="box">
            <h1>Login</h1>
            <div class="content">
                <input type="text" name="emailOrname" id="" class="inputs" placeholder="email er name" />
                <input type="password" name="password" id="" class="inputs" placeholder="password" />
                <input type="submit" name="submit" value="login" class="buttons">
            </div>
            <span>don't have an account</span>
            <a href="register.php">register</a>
        </div>
    </form>
</body>

</html>