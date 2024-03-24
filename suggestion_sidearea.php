
<p class="suggestion-text"> Suggest for you</p>
<?php include ("get_suggestions.php") ?>
<?php foreach($suggestions as $suggestion){?>

    <?php if($suggestion['id'] != $_SESSION['id']) {?>
<div class="suggestion-card">
    <div class="suggestion-pic">
        <form action="other_user_profile.php" id="suggestion_form_<?php echo $suggestion['id']; ?>" method="post">
            <input type="hidden" value="<?php echo $suggestion['id'];?>" name="other_user_id">
                    <!-- Sử dụng JavaScript để submit form khi hình ảnh được nhấp -->
            <img onclick="document.getElementById('suggestion_form_<?php echo $suggestion['id']; ?>').submit();" src="<?php echo "assets/images/" .$suggestion['image'];?>" alt="">
        </form>
    </div>
    <div>
        <p class="username"><?php echo $suggestion['username'];?></p>
        <p class="sub-text"><?php echo substr($suggestion['bio'],0,15); ?></p>
    </div>
    <form action="follow_this_person.php" method="post">
        <input type="hidden" name="other_user_id" value="<?php echo $suggestion['id']; ?>">
        <button class="follow-btn" type="submit" name="follow_btn">Follow</button>
    </form>
</div>
        <?php }?>
<?php }?>