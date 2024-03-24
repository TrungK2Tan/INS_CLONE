<?php
    include("includes/header.php");
?>
    <!--section-->
    <section class="main">
        <div class="wrapper">
            <div class="left-col">
                <h3>Update  Profile</h3>
                <?php 
                if(isset($_GET['error_message'])){?>
                    <p class="text-center alert-danger">
                        <?php echo $_GET['error_message'] ?>
                    </p>
                <?php }?>
                <form action="update_profile.php" method ="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <img src="<?php echo "assets/images/" .$_SESSION['image'];?>" class="edit-profile-image" alt="">
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <p class="form-control">Email</p>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?php echo $_SESSION['username']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                      <textarea name="bio" id="bio" class="form-control" cols="30" rows="3" required><?php echo $_SESSION['bio']?></textarea>
                    </div>
                    <div class="mb-3">
                      <input type="submit" name="update_profile_btn" id="update_profile_btn" name="update_profile_btn" class="update_profile_btn" value="update">
                    </div>
                </form>
            </div>
            <div class="right-col">
                <!--profile card-->
                <?php include("profile_card.php"); ?>
                
                <!--suggestion card-->
                <?php include("suggestion_sidearea.php"); ?>
            </div>
        </div>
    </section>
    <!--script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>