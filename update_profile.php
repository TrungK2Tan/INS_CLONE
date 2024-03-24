<?php

session_start();
include("db/connection.php");

if(isset($_POST['update_profile_btn'])){
    $user_id = $_SESSION['id'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $image = $_FILES['image']['tmp_name'];

    if($image != ""){
        $image_name = $username . ".jpg";
    }else {
        $image_name= $_SESSION['image'];
    }
    if($username != $_SESSION['username']){
        $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt -> store_result();
        // there is a users with this username
        if($stmt ->num_rows()>0){
            header("location: edit_profile.php?error_message=Username was already taken");
            exit();
        }
        else{
            updateUserProfile($conn,$username,$bio,$image_name,$user_id,$image);
        }
    }
    else{
        updateUserProfile($conn,$username,$bio,$image_name,$user_id,$image);
    }
}
else{
    header("location:edit_profile.php?error_message?error occured, try again");
    exit();
}
// 
function updateUserProfile($conn,$username,$bio,$image_name,$user_id,$image){
    $stmt = $conn->prepare("UPDATE users SET username = ?, bio=?, image=? WHERE id=?");
    $stmt->bind_param("sssi", $username, $bio, $image_name, $user_id);
    if($stmt -> execute()){
        if($image != ""){
            //store image in folder
            move_uploaded_file($image,"assets/images/" .$image_name);
        }
        //update session
        $_SESSION['username'] = $username;
        $_SESSION['bio'] = $bio;
        $_SESSION['image'] = $image_name;

        updateProfileImageAndUserNameInPostTTable($conn, $username, $image_name,$user_id);
        updateProfileImageAndUserNameInCommentsTable($conn, $username, $image_name,$user_id);

        header("location: profile.php?success_message?Profile has been updated successfully");
        exit();
    }else{
        header("location: edit_profile.php?success_message?error occured, try again");
        exit();
    }
}
function updateProfileImageAndUserNameInCommentsTable($conn, $username, $image_name,$user_id)
{
    $stmt = $conn->prepare("UPDATE comments SET username = ?, profile_image=? WHERE user_id=?");
    $stmt->bind_param("ssi", $username, $image_name, $user_id);
    $stmt->execute();
}
function updateProfileImageAndUserNameInPostTTable($conn, $username, $image_name,$user_id)
{
    $stmt = $conn->prepare("UPDATE posts SET username=?,profile_image=? WHERE user_id=?");
    $stmt->bind_param("ssi", $username, $image_name, $user_id);
    $stmt->execute();
}
?>