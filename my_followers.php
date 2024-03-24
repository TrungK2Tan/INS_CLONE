<?php 

    include("includes/header.php");
    include("db/connection.php");

    $user_id = $_SESSION['id'];
    $stmt = $conn ->prepare("SELECT user_id FROM followings WHERE other_user_id= ?");
    $stmt -> bind_param("i",$user_id);

    $stmt->execute();
    $ids = array ();
    $result = $stmt  ->get_result();
    while($row = $result ->fetch_array(MYSQLI_NUM)){
        foreach($row as $r){
            $ids[] = $r;
        }
    }
    if(empty($ids)){
        $message = "you have no followers";
       }else{
        $followers_ids = join(",",$ids);
        $stmt = $conn ->prepare("SELECT * FROM users WHERE id in ($followers_ids)");
        $stmt ->execute();
        $other_people = $stmt ->get_result();
       }
?>
    <div class="mt-5 mx-5">
       <?php if(isset($message)){ ?>
        <p class="text-center"><?php echo $message;?></p>
       <?php } else if ($other_people != null && $other_people ->num_rows>0){?>
        <ul class="list-group">
            <?php foreach($other_people as $user){ ?>
                <?php if($user['id'] != $_SESSION['id']){?>
            <li class="list-group-item search-result-item">
                <img src="<?php echo "assets/images/" . $user['image']; ?>" alt="">
                <div>
                    <p><?php echo $user['username']; ?></p>
                    <span><?php echo substr($user['bio'], 0 , 20); ?></span>
                </div>
                <div class="search-result-item-btn">
                    <form action="other_user_profile.php" method="post">
                        <input type="hidden" name="other_user_id" value="<?php echo $user['id'];?>">
                        <button type="submit">Visit Profile</button>
                    </form>
                </div>
            </li>
                <?php }?>
            <?php }?>
        </ul>
        <?php } else{ ?>
            <p> No followers to display.</p>
            <?php }?>
    </div>
    <!--script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>