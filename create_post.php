<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "socialy";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Retrieve post data
    $location = $_POST["location"];
    $content = $_POST["content"];

    $uploadDir = "img/"; // Change this to your desired directory
    $uploadedFile = $_FILES["image"];

    // Check if the file size is within acceptable limits (e.g., 5MB)
    $maxFileSize = 5 * 1024 * 1024; // 5MB in bytes
    if ($uploadedFile["size"] > $maxFileSize) {
        echo "Error: File size exceeds the allowed limit.";
        exit;
    }

    // Generate a random name for the file
    $randomName = uniqid() . '_' . rand(1000, 9999) . '.' . pathinfo($uploadedFile["name"], PATHINFO_EXTENSION);

    $uploadPath = $uploadDir . $randomName;

    move_uploaded_file($uploadedFile["tmp_name"], $uploadPath);

    // Assuming user_id is currently logged in user's ID, change as per your application's logic
    $user_id = $_SESSION['user_id']; // Change this line according to your session variable storing user ID

    $sql = "INSERT INTO posts (user_id, content, image_path, timestamp, location) VALUES ('$user_id', '$content', '$randomName', NOW(), '$location')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to home page after successful post creation
        header("Location: home.php");
        exit();
    }
}
?>





<!-- create-post.html  21 Nov 2019 04:05:02 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Socialy</title>
  

  <style>
    /* Resetting margins and padding */
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
    }

    /* Centering content */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f0f0f0; /* Set background color as needed */
    }

    /* Card styling */
    .card {
      width: 400px; /* Adjust card width as needed */
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adjust box shadow as needed */
      background-color: #fff;
    }

    .card-header {
      padding: 20px;
      border-bottom: 1px solid #ddd;
    }

    .card-body {
      padding: 20px;
    }

    /* Form styling */
    .form-group label {
      font-weight: bold;
      margin-bottom: 10px;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    /* Button styling */
    .btn-primary {
      margin-top: 2rem;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    h4 {
      font-size: large;
      
    }

    .custum-file-upload {
  height: 200px;
  width: 300px;
  display: flex;
  flex-direction: column;
  align-items: space-between;
  gap: 20px;
  cursor: pointer;
  align-items: center;
  justify-content: center;
  border: 2px dashed #cacaca;
  background-color: rgba(255, 255, 255, 1);
  padding: 1.5rem;
  border-radius: 10px;
  box-shadow: 0px 48px 35px -48px rgba(0,0,0,0.1);
}

.custum-file-upload .icon {
  display: flex;
  align-items: center;
  justify-content: center;
}

.custum-file-upload .icon svg {
  height: 80px;
  fill: rgba(75, 85, 99, 1);
}

.custum-file-upload .text {
  display: flex;
  align-items: center;
  justify-content: center;
}

.custum-file-upload .text span {
  font-weight: 400;
  color: rgba(75, 85, 99, 1);
}

.custum-file-upload input {
  display: none;
} 



    
  </style>
</head>

<!--main-content -->



<form action="#" method="post" enctype="multipart/form-data" class="form" id="createPost">
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Your Post</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="location">
                      </div>
                    </div>
                  
                    <label class="custum-file-upload" for="file">
                        <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
                        </div>
                        <div class="text">
                           <span>Click to upload image</span>
                           </div>
                           <input type="file" id="file" name="image">
                        </label><br>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" name="content"></textarea>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" name="submit" >Create Post</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        </div>
    </div>
    
</form>

 