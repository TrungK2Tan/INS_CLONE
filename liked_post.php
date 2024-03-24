
<?php include("includes/header.php");?>
<?php 

    include("db/connection.php");
   $user_id = $_SESSION['id'];
   $stmt = $conn ->prepare("SELECT post_id FROM likes WHERE user_id = ?");
   $stmt ->bind_param("i",$user_id);
   $stmt->execute();
   $ids = array();
   $result = $stmt ->get_result();
   while($row = $result->fetch_array(MYSQLI_NUM)){
    foreach($row as $r){
        $ids[] = $r;
    }
   }
   if(empty($ids)){
    $error_message = "you have not like any post yet";
   }else{
    $ids_of_posts_you_liked = join(",", $ids);
    $stmt = $conn -> prepare("SELECT * FROM posts WHERE id in ($ids_of_posts_you_liked) ORDER BY id DESC");
    $stmt ->execute();
    $posts = $stmt->get_result();
   }

?>
    <main>
        <div class="discover-container">
            <div class="gallery">
   <?php if(!isset($posts)){ ?>
    <div class="mx-auto mt5 alert alert-danger">
        <?php echo $error_message?>
        <a href="discover.php" style="color:rgb(0, 162, 255)">Discover great posts now</a>
    </div>
   <?php } else{?>


            <?php foreach($posts as $post){ ?>
                <div class="gallery-item">
                    <img src="<?php echo "assets/images/" .$post['image']; ?>" class="gallery-image" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes">
                                <span class="hide-gallery-element"><?php echo $post['likes'];?></span>
                                <i class="fas fa-heart"></i>
                            </li>
                            <li class="gallery-item-comments">
                                <span class="hide-gallery-element"></span>
                                <a href="single_post.php?post_id=<?php echo $post['id'];?>" style="color:#fff">
                                    <i class="fas fa-comment"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <?php }?>
            </div>
            
        </div>
       
    </main>
       <!--script-->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>