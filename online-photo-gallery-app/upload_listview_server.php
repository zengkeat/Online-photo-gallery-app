<?php

session_start();

//for preventing user access explore.php or account.php without login
if(!isset($_SESSION['login_user'])){
  header('location:login.php');
  session_write_close();
  exit();
}

$title = '';
$description = '';
$file_name= '';
$timestamp = date("Y-m-d H:i:s");
$categories='';
$captions= '';
$id= 0;
$update = false;

$errors = array();

include("conn.php");


// insert post
if(isset($_POST['ImageSubmit'])){

  $title = mysqli_real_escape_string($con, $_POST['title']);
  $description = mysqli_real_escape_string($con,$_POST["description"]);
  $categories = $_POST['categories'];
  $captions = $_POST['captions'];

  $file_name = $_FILES["file"]['name'];
	$file_tmp_name = $_FILES["file"]['tmp_name'];


    //**test
    // print($file_size);

  if (empty($title)) {  array_push($errors, "Title is required");}
  if (empty($description)) { array_push($errors, "Description is required"); }
  if (empty($file_name)) { array_push($errors, "Please Insert a Image"); }
  if (empty($categories)) { array_push($errors, "Please Select a Caltegories"); }
  if (empty($captions)) { array_push($errors, "Please Insert at least one caption"); }



  // first check the database to make sure a title does not already exist
  $title_check = "SELECT * FROM post WHERE title='$title' LIMIT 1";
  //The mysqli_query() function performs a query against the database.
  //$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
  $result = mysqli_query($con, $title_check);
  //The mysqli_fetch_assoc() function fetches a result row as an associative array.
  $get_title = mysqli_fetch_assoc($result);

  if ($get_title) { // if title exists
    if ($get_title['title'] === $title) {
      array_push($errors, "Title already exists");
    }
  }

  //Finally, save the post if there are no errors in the form
  if (count((array)$errors) == 0) {

    // the location of the folder that yours images save into
    $location = "image/$file_name";


    $login_username = $_SESSION['login_user'];

    //**test
    // print_r($login_username);

    //need to set the timestamp format for timestamp field in order to work

    $sql = "INSERT INTO post (username, title, description, file, timestamp, likes, categories, captions)
         VALUES( '$login_username','$title', '$description','$file_name',NOW(), '0', '$categories', '$captions')";
    mysqli_query($con, $sql);
    $con->close();
    // if image upload to the file correctly
    if (move_uploaded_file($file_tmp_name,$location)){
	     $_SESSION['post_notification'] = "Post Successfully!";
      header('location: account.php');
    }
}

}

//  **when user press update button on the picture, it will redirect to the post.php and get the id of the post, so later we can
// put in in the hidden field in the post form **
// fill in the form with old result for user to update and also pass throught the post $id to
// the hidden input at the form
if (isset($_GET['edit'])) {
  // get the id of the post
  $id = $_GET['edit'];

  // print_r($_GET);

  //the purpose of adding $update = true is to change the buttonm on the post form from save to update if the update is true.
  $update = true;
  $record = mysqli_query($con, "SELECT * FROM post WHERE id = '$id' ");
  if (count((array)$record) >= 1 ) {
    $n = mysqli_fetch_array($record);
    //get the detail of the post by id then fill in with old result.
    $title = $n['title'];
    $description = $n['description'];
    $file_name = $n['file'];
    $categories = $n['categories'];
    $captions = $n['captions'];
  }
}


// post update after press update button
if (isset($_POST['update'])) {

  // there is a hidden id input at the form for grabbing the id of the post for updating
	$id = $_POST['post_id'];
  $title = mysqli_real_escape_string($con, $_POST['title']);
  $description = mysqli_real_escape_string($con, $_POST["description"]);
  $categories = $_POST['categories'];
  $captions = $_POST['captions'];
  // $file = $_FILES["file"];

  $file_name = $_FILES["file"]['name'];
  $file_tmp_name = $_FILES["file"]['tmp_name'];

  if (empty($title)) {  array_push($errors, "Title is required");}
  if (empty($description)) { array_push($errors, "Description is required"); }
  if (empty($file_name)) { array_push($errors, "Please Insert a Image"); }
  if (empty($categories)) { array_push($errors, "Please Select a Caltegories"); }
  if (empty($captions)) { array_push($errors, "Please Insert at least one caption"); }


  if (count($errors) == 0){

  $location = "image/$file_name";

	mysqli_query($con, "UPDATE post SET title='$title', description='$description', file='$file_name', timestamp='$timestamp',
                categories='$categories', captions='$captions' WHERE id='$id' ");

  if (move_uploaded_file($file_tmp_name,$location)){
     $_SESSION['post_notification'] = "Successfully Update!";
    header('location: account.php');
        }

    }
}

// post delete after press delete button
if (isset($_POST['PostDeleteYes'])) {
  $id = $_POST['post_id'];
	mysqli_query($con, "DELETE FROM post WHERE id= '$id' ");
	$_SESSION['post_notification'] = "Successfully Deleted!";
	header('location: account.php');
}elseif(isset($_POST['PostDeleteNo'])){
  $_SESSION['post_notification'] = "Discard Delete!";
  header('location: account.php');
}

//like/unlike button
// get the login user id for adding into the likes table
$username = $_SESSION['login_user'];
$sql = mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
$userid = mysqli_fetch_array($sql);
$user_id = $userid['id'];


//when user clicking the like button, it will first go throught the javascript AJAX then only php can grab the varaible $_POST['liked'] or ['unliked']
if (isset($_POST['liked'])) {
  $postid = $_POST['postid'];
  $result = mysqli_query($con, "SELECT * FROM post WHERE id=$postid");
  $row = mysqli_fetch_array($result);
  $n = $row['likes'];

  // add the user_id and post_id into the likes table when we click like button fot the first time, so next time when we clicked the button again,
  // php will check the likes table isit have the same user_is and the same post_id, then it will execute other code.
  mysqli_query($con, "INSERT INTO likes (userid, postid) VALUES ($user_id, $postid)");
  mysqli_query($con, "UPDATE post SET likes=$n+1 WHERE id= $postid ");

  echo $n+1;
  exit();
}
if (isset($_POST['unliked'])) {
  $postid = $_POST['postid'];
  $result = mysqli_query($con, "SELECT * FROM post WHERE id=$postid");
  $row = mysqli_fetch_array($result);
  $n = $row['likes'];

  mysqli_query($con, "DELETE FROM likes WHERE userid=$user_id AND postid=$postid");
  mysqli_query($con, "UPDATE post SET likes=$n-1 WHERE id=$postid");

  echo $n-1;
  exit();
}


//captions hastag detection fucntion
function hashtag($string){
  $htag = '#';
  $arr = explode(" ", $string);
  $arrc = count($arr);
  $i = 0;

  while($i< $arrc){

    if(substr($arr[$i],0, 1) === $htag ){
      //due to php cant get the captions with hashtag(#) in the word, example:$explore.php?captions=#what,
      // so i remove the "#" in the link, example: explore.php?captions=what, then only php can get the captions.
      $arr[$i] = "<a href='explore.php?captions=" .substr($arr[$i], 1)." '>".$arr[$i]."</a>";
    }

    $i++;
  }

  $string = implode(" ", $arr);
  return $string;
}
 ?>
