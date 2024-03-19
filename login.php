<?php
session_start();

// Check if the user is already logged in, redirect to home page if logged in


// Include database connection file
include 'connectdb.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password_hash'];

    // Check user credentials
    $query = "SELECT * FROM users WHERE email = '$email' AND password_hash = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists, set session variable and redirect to home page
        $user = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $user['user_id'];
        header("Location: home.php");
        exit;
    } else {
        // Invalid credentials, show error message
        $error = "Invalid email or password.";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socialy - Login</title>
    <link rel="stylesheet" href="css/socialy.css">
</head>
<body>
    <section class="container">
        <div class="heading">Socialy</div>
        <form action="#" method="post" class="form" id="loginForm">
            <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
            <input required class="input" type="password" name="password_hash" id="password" placeholder="Password">
            <span class="forgot-password" id="forgotForm"><a href="forgotpass.html">Forgot Password?</a></span>
            <?php if(isset($error)) echo '<div class="error">' . $error . '</div>'; ?>
            <input class="login-button" type="submit" value="Login">
        </form>
    </section> 
</body>
</html>
