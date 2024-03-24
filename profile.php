<?php
    include("includes/header.php");
?>
    <!---->
    <header class="profile-header">
        <div class="profile-container">
        <?php 
                if(isset($_GET['success_message'])){?>
                    <p class="text-center alert-success">
                        <?php echo $_GET['success_message'] ?>
                    </p>
                <?php }?>
        <?php 
                if(isset($_GET['error_message'])){?>
                    <p class="text-center alert-danger">
                        <?php echo $_GET['error_message'] ?>
                    </p>
                <?php }?>
            <div class="profile">
                <div class="profile-image">
                    <img src="<?php echo "assets/images/".$_SESSION['image'];?>" alt="">
                </div>
                <div class="profile-user-settings">
                    <h1 class="profile-user-name">
                        <?php  echo $_SESSION['username'];?>
                    </h1>
                    <form action="edit_profile.php" method="get" style="display: inline-block;">
                        <button class="profile-btn profile-edit-btn">Edit  Profile</button>
                    </form>
                    <button class="profile-btn profile-settings-btn" id="options_btn" aria-label="profile settings">
                        <i class="fas fa-cog"></i>
                    </button>
                    <div class="popup" id="popup">
    <div class="popup-window">
        <span class="close-popup" id="close_popup">&times;</span>
        <a href="edit_profile.php">Edit Profile</a>
        <a href="camera.php">Create Post</a>
        <a href="logout.php">Log Out</a>
    </div>
</div>
                </div>
                <div class="profile-stats">
                    <ul>
                        <li><span class="profile-stat-count">    <?php  echo $_SESSION['post'];?></span>posts</li>
                        <form action="my_followers.php" method="post" style="display:inline-block;">
                            <li><span class="profile-stat-count">    <?php  echo $_SESSION['followers'];?></span>
                                <input type="submit" value="followers" style="background:none;border:none;">
                            </li>
                        </form>
                        <form action="my_followings.php" method="post" style="display:inline-block;">
                            <li><span class="profile-stat-count">    <?php  echo $_SESSION['following'];?></span>
                                <input type="submit" value="following" style="background:none;border:none;">
                            </li>
                        </form>
                    </ul>
                </div>
                <div class="profile-bio">
                    <p><span class="profile-real-name">    <?php  echo $_SESSION['username'] . ", ";?></span>     <?php  echo $_SESSION['bio'];?></p>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="profile-container">
            <div class="gallery">
                <?php include("get_user_post.php");?>

                <?php foreach($posts as $post) {?>
                <div class="gallery-item">
                <img  src="<?php echo "assets/images/" . $post['image']; ?>" class="gallery-image" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes">
                                <span class="hide-gallery-element"><?php echo $post['likes']; ?></span>
                                <i class="fas fa-heart"></i>
                            </li>
                            <li class="gallery-item-comments">
                            <a href="single_post.php?post_id=<?php echo $post['id'];?>" style="color:#fff">
                                    <i class="fas fa-comment"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php }?>                     
            </div>
            
        </div>
    </main>
       <!--script-->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" ></script>
       <script>
    // Select elements
var popupWindow = document.getElementById('popup');
var optionsBtn = document.getElementById('options_btn');
var closeWindow = document.getElementById('close_popup');

// Hide the popup initially
popupWindow.style.display = "none";

// Add event listener to the options button
optionsBtn.addEventListener('click', function(e) {
    e.preventDefault();
    // Toggle display of the popup
    if (popupWindow.style.display === "none") {
        popupWindow.style.display = "block";
    } else {
        popupWindow.style.display = "none";
    }
});

// Add event listener to the close button
closeWindow.addEventListener('click', function(e) {
    e.preventDefault();
    popupWindow.style.display = "none";
});

// Add event listener to close the popup when clicking outside of it
window.addEventListener('click', function(e) {
    if (e.target == popupWindow) {
        popupWindow.style.display = "none";
    }
});

</script>

</body>
</html>