<?php
session_start();
include('connectdb.php');
//echo $_SESSION['user_id'];
// Step 2: Executing a query
$sql = "SELECT username, profile_picture_url FROM users where user_id='".$_SESSION['user_id']."'";
$query = mysqli_query($conn, $sql);
if ($query) {
    $row = mysqli_fetch_array($query);
    // Now you can access $row safely
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($conn);
}



?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socialy</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <nav>
        <div class="container">
            <h2 class="log">
                Socialy
            </h2>
            <div class="search-bar">
                <i class="uil-uil-sreach"></i>
                <input type="search" placeholder="search name, creator...">
            </div>
            <div class="create">
            <a href="register.php" class="btn btn-primary" id="create-post">Create</a>

                <div class="profile-picture">
                <a href="profile.php"> <!-- Replace profile.html with your desired link -->
        <img src="img/user.jpg" alt="profile-picture">
      </a>
                </div>
            </div>
        </div>
    </nav>

  
<!--========================================= MAIN ========================================================-->
<main>
    <div class="container">
<!--========================================= LEFT ========================================================-->
        <div class="left">

        

        <a class="profile">
            <div class="profile-picture">
            <?php 
                    $image_url = $row['profile_picture_url'];
                    // Check if image exists or if profile_picture_url is empty
                    if (!empty($image_url)) { ?>

                       <img src="img/<?php echo $image_url;?>" alt="user-photo">

                    <?php } else {  ?>

                       <img src="img/dummy_img.jpeg" alt="Default User Photo">

                  <?php  } ?>
            </div>
            <div class="handle">
                <p class="">@<?php echo $row['username']; ?></p>
            </div>
        </a>
                    

            <!-- <a  class="profile">
                <div class="profile-picture"? >
                    <img src="img/user.jpg" alt="user-photo">
                </div>
                <div class="handle">
                    <h4>Dhruvil Nayak</h4>
                    <p class="text-muted">@dhruvil_123</p>
                </div>
            </a> -->
<!----------------------------------------- SIDEBAR ------------------------------------->
            <div class="sidebar">
                <a  class="menu-item active" >
                    <span><i class="uil uil-estate"></i></span> <h4>Home</h4> 
                </a>
                <a  class="menu-item" id="notifications">
                    <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span><h4>Notification</h4>
<!----------------------------------------- Notification Popup ------------------------------------->
                <div class="notification-popup">
                    <div>
                        <div class="profile-picture">
                            <img src="img/p1.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Preet Patel</b> accept your friend request.
                            <small class="text-muted">2 Days Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-picture">
                            <img src="img/p2.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Dhruvil Patel</b> accept your friend request.n 
                            <small class="text-muted">2 Days Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-picture">
                            <img src="img/p3.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Tirth Patel</b> accept your friend request.
                            <small class="text-muted">1 Days Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-picture">
                            <img src="img/p4.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Adarsh Patel</b> accept your friend reuest.
                            <small class="text-muted">1 Days Ago</small>
                        </div>
                    </div>
                    <div>
                        <div class="profile-picture">
                            <img src="img/p5.jpg">
                        </div>
                        <div class="notification-body">
                            <b>Hiten Prajapati</b> accept your friend reuest.
                            <small class="text-muted">7 hr Ago</small>
                        </div>
                    </div>
                </div>
                </a>
                </a>
                <a  class="menu-item">
                    <span><i class="uil uil-setting"></i></span> <h4>Settings</h4>
                </a>
                <a  class="menu-item ">
                    <span><i class="uil uil-swatchbook"></i></span> <h4>Theme</h4>
                </a>
            </div>
            <!----------------------------------------- END OF SIDEBAR  ------------------------------------->
            <a href="create_post.php" id="create-post" class="btn btn-primary">Create Post</a>

        </div>
<!--========================================= MIDDLE ========================================================-->
        <div class="middle">
            <!----------------------------------------- STORIES  ------------------------------------->
            <div class="stories">
                <div class="story">
                    <div class="profile-picture">
                        <img src="img/p6.jpg" >
                    </div>
                    <p class="name">Your Story</p>
                </div>
                <div class="story">
                    <div class="profile-picture">
                        <img src="img/p4.jpg" >
                    </div>
                    <p class="name">Tirth Patel</p>
                </div>
                <div class="story">
                    <div class="profile-picture">
                        <img src="img/p5.jpg" >
                    </div>
                    <p class="name">Preet Patel</p>
                </div>
                <div class="story">
                    <div class="profile-picture">
                        <img src="img/p6.jpg" >
                    </div>
                    <p class="name">Dhruvil Patel</p>
                </div>
                <div class="story">
                    <div class="profile-picture">
                        <img src="img/p3.jpg" >
                    </div>
                    <p class="name">Hiten Prajapati</p>
                </div>
            </div>
  <!----------------------------------------- END OF STORIES  ------------------------------------->
            <form  class="create-post">
                <div class="profile-picture">
                    <img src="img/user.jpg">
                </div>
                <input type="text" placeholder="Write your thought here, Dhruvil" id="create-post">
                <input type="submit" value="ADD" class="btn btn-primary">
            </form>
     <!----------------------------------------- FEEDS  ------------------------------------->
     
            <div class="feeds">
                <?php 
                $query=mysqli_query($conn,"SELECT * FROM posts");
                while($data=mysqli_fetch_array($query)) {
                ?>
                <div class="feed">
                    <div class="head">
                        <div class="user">
                            <div class="profile-picture">
                            <?php 
                            $userPost=mysqli_query($conn,"select * from users where user_id='".$data['user_id']."'");
                            $userData=mysqli_fetch_array($userPost); 
                            
                            $image_url_2= $userData['profile_picture_url'];
                            // Check if image exists or if profile_picture_url is empty
                            if (!empty($image_url_2)) { ?>

                            <img src="img/<?php echo $image_url;?>" alt="user-photo">

                            <?php } else {  ?>

                            <img src="img/dummy_img.jpeg" alt="Default User Photo">

                        <?php  } ?>
                            </div>
                            <div class="info">
                                <h3><?php echo $userData['username']; ?></h3>
                                <small><?php echo $data['location'];?></small>
                            </div>
                        </div>
                        <span class="edit">
                            <i class="uil uil-ellipsis-h"></i>
                        </span>
                    </div> 
                    <div class="photo">
                          <img src="img/<?php echo $data['image_path'];?>">
                    </div>

                    <div class="action-button">
                        <div class="interaction-button">
                            <span class="intera ction-button">
                                <span class="uil uil-heart"></span>
                                <small class="like-count">0</small> <!-- Initial like count -->
                            </span>
                            <span class="uil uil-comment"></span>
                            <span><i class="uil uil-share"></i></span>
                        </div>
                        <div class="save">
                            <span><i class="uil uil-bookmark"></i></span>
                        </div>
                    </div>
                    <div class="liked-by">
                        <span><img src="img/n2.jpg"></span>
                        <span><img src="img/p6.jpg"></span>
                        <span><img src="img/p1.jpg"></span>
                        <p>liked by <b>Hiten Prajapati</b>and <b>5 others</b></p>
                    </div>
                    <div class="caption">
                        <p><b><?php echo $userData['username'];?></b> <?php echo $data['content'];?></p>
                    </div>
                    <div class="comments text-muted">
    <!-- Fetch and display comments -->
</div>
                </div>

            <?php } ?>
                <!-- <div class="feed">
                    <div class="head">
                        <div class="user">
                            <div class="profile-picture">
                                <img src="img/user.jpg">
                            </div>
                            <div class="info">
                                <h3>Tirth Patel</h3>
                                <small>City, Mehsana</small>
                            </div>
                        </div>
                        <span class="edit">
                            <i class="uil uil-ellipsis-h"></i>
                        </span>
                    </div>
                    <div class="photo">
                        <img src="img/n7.jpg">
                    </div>

                    <div class="action-button">
                        <div class="interaction-button">
                            <span><i class="uil uil-heart"></i></span>
                            <span><i class="uil uil-comment"></i></span>
                            <span><i class="uil uil-share"></i></span>
                        </div>
                        <div class="save">
                            <span><i class="uil uil-bookmark"></i></span>
                        </div>
                    </div>
                    <div class="liked-by">
                        <span><img src="img/n2.jpg"></span>
                        <span><img src="img/p6.jpg"></span>
                        <span><img src="img/p1.jpg"></span>
                        <p>liked by <b>Hiten Prajapati</b>and <b>5 others</b></p>
                    </div>
                    <div class="caption">
                        <p><b>Dhruvil Nayak</b>  Nature is so cool </p>
                    </div>
                    <div class="comments text-muted"> view all 7 comments</div>
                </div>-->
            </div>
        </div> 
<!--========================================= RIGHT ========================================================-->
        <div class="right">
            <div class="friend-request">
                <h4>Request</h4>
                <div class="request">
                    <div class="info">
                        <div class="profile-picture">
                           <img src="img/p4.jpg">
                         </div>
                        <div>
                            <h4>Tirth Patel</h>
                            <P class="text-muted">5 mutual friend</P>
                        </div>
                    </div>
                     <div class="action">
                        <button class="btn btn-primary">
                            Accept
                        </button>
                        <button class="btn btn-primary">
                            Declined
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<script src="js/home.js"></script>
<script src="js/socialy.js"></script>
</body>
</html>