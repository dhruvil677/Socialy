<?PHP



// Start session to store error messages
session_start();

// Include database connection file
include 'connectdb.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Check if username, email, or phone number already exist in the database
    $query = "SELECT * FROM users WHERE username = '$name' OR email = '$email' OR mobile_num = '$phone'";
    $result = mysqli_query($conn, $query);
    FV 
    if (mysqli_num_rows($result) > 0) {
        // User already exists
        $_SESSION['error'] = "User already registered with this username, email, or phone number.";
    } else {
        // Insert user data into the database
        $query = "INSERT INTO users (username, email, mobile_num, password_user, registration_date) VALUES ('$name', '$email', '$phone', '$password', NOW())";
        if (mysqli_query($conn, $query)) {
            // Registration successful
            header("Location: login.php");
            exit();
        } else {
            // Error occurred while inserting data
            $_SESSION['error'] = "Error: " . mysqli_error($conn);
        }
    }

    // Close database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socialy
    </title>
    <link rel="stylesheet" href="css/socialy.css">
</head>
<body>
<section class="container">
        <div class="heading">Socialy</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form" id="registerForm">
            <input required="" class="input" type="text" name="name" id="name" placeholder="User Name">
            <input required="" class="input" type="email" name="email" id="email" placeholder="E-mail">
            <input required="" class="input" type="tel" name="phone" id="phone" placeholder="Mobile Number">
            <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
            <span class="forgot-password"><a href="forgotpass.html">Forgot Password ?</a></span>
            <input class="login-button" type="submit" value="Register">
            <?php
            // Display error message if any
            if (isset($_SESSION['error'])) {
                echo '<div class="error">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>
        </form>
    </section>
    
</body>
</html>