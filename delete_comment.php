<?php 

    include("db/connection.php");

    if(isset($_POST['delete_comment_btn'])){

        $comment_id = $_POST['comment_id'];
        $post_id = $_POST['post_id'];
        $stmt = $conn->prepare("DELETE FROM comments WHERE id =?");
        $stmt->bind_param("i", $comment_id);
        $stmt->execute();

        if($stmt->execute()){
            header("location: single_post.php?post_id=".$post_id . "success_message?comment has been delete successfully");
            exit();
        }else{
            header("location: single_post.php?post_id=".$post_id . "error_message?=comment couldn't be deleted");
            exit();
        }

    }else{
        header(("location: index.php"));
        exit();
    }


?>