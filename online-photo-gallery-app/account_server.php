<?php

include("conn.php");
session_start();

//for preventing user access explore.php or account.php without login
if(!isset($_SESSION['login_user'])){
  header('location:login.php');
  session_write_close();
  exit();
}

$errors = array();
  // GET THE EMAIL and id(hidden in the form )TO SHOW IN THE ACCOUNT PAGE
  $account_user = $_SESSION['login_user'];
  $get_account_info = mysqli_query($con,"SELECT * FROM users WHERE username = '$account_user' ");
  $user = mysqli_fetch_array($get_account_info);
  $user_username = $user['username'];
  $email = $user['email'];
  $user_id = $user['id'];
  $user_picture =$user['profile_picture'];

  $pageTitle= "UserAccount";


// profile picture insert after pressing submit button
  if(isset($_POST["profile_picture_submit"])){
    $id = $_POST["user_profile_id"];
    $file_name = $_FILES["profile_picture"]['name'];
    $file_tmp_name = $_FILES["profile_picture"]['tmp_name'];


    if (empty($file_name)) { array_push($errors, "Please Insert a Image"); }

    if (count((array)$errors) == 0){

    $location = "image/profile_image/$file_name";

    mysqli_query($con, "UPDATE users SET profile_picture='$file_name' WHERE id='$id' ");

    if (move_uploaded_file($file_tmp_name,$location)){
      header('location: account.php');
          }

      }
  }

?>
