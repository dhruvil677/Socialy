<?php
// edit_profile.php

include 'connectdb.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $profilePicture = $_POST['profilePicture'];

    // Update profile information in the database
    $sql = "UPDATE profiles SET fullName='$fullName', bio='$bio', profilePicture='$profilePicture' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to profile page after successful update
        header("Location: profile.php");
        exit;
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    $conn->close(); 
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <header>
        <div class="container">
            <h3>Edit Profile</h3>
        </div>
    </header>
    <main>
        <div class="container">
            <form id="editProfileForm" method="post" action="update_profile.php"> <!-- Changed action attribute -->
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio" placeholder="Enter your bio"></textarea>
                </div>
                <div class="form-group">
                    <label for="profilePicture">Profile Picture URL</label>
                    <input type="url" id="profilePicture" name="profilePicture" placeholder="Enter the URL of your profile picture">
                </div>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </main>
</body>
</html>
