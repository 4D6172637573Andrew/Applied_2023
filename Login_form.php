<?php
include_once "header_login.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equive="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <Title>login form</Title>
    <link rel="stylesheet" href="css/login_style.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</head>

<body><br><br><br>
    <div class="box">
        <form action="Login_check.php" method="post">
            <h1>LOGIN</h1>
            <div class="input-box">
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
                <box-icon name='user'></box-icon>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
                <box-icon name='lock-alt' ></box-icon>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <a href="index_main.php" class="btn btn-outline-success">Login</a>
            
            <div class="register-link">
                <p>No account? <a href="#">Signup</a></p>
            </div>
        </form>
    </div>
</body>
</html>



<!-- <div class="container">
    <br>
    <h1><b>Login Page:</b></h1>
    <form action="Login_check.php" method="post">
        <div class="form-group">
            <label for="login">Login ID:</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Enter login ID">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div><br>
        <button type="submit" class="btn btn-success">LOGIN</button>
        <br><br><br><br><br><br><br><br><br>
    </form>
</div> -->







