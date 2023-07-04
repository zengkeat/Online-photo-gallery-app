
<?php
session_start();
$pageTitle = "AdminDetail";
include("base.php");
include("conn.php");


//for preventing user access explore.php or account.php without login
if(!isset($_SESSION['admin'])){
  header('location:login.php');
  session_write_close();
  exit();
}

?>



<?php
// user profile detail
if (isset($_GET['edit'])) {
  // get the id of the post
  $id = $_GET['edit'];

  $user_info = mysqli_query($con, "SELECT * FROM users WHERE id = '$id' ");

  if (count((array)$user_info) >= 1 ) {
    $n = mysqli_fetch_array($user_info);
    $id = $n['id'];
    $username = $n['username'];
    $email = $n['email'];
    $profile_picture = $n['profile_picture'];
    $role = $n['role'];
  }

  $user_post = mysqli_query($con, "SELECT * FROM post WHERE username = '$username' ");
  $post_number = mysqli_num_rows($user_post);

  echo "<div class='admin_detail' >";

// user profile
  echo "<div class='' style='float:left;padding:0 10px 10px 10px;'>";

  echo "<div class='' style='height:400px;width:300px;border:1px solid black;box-shadow: 4px 4px 8px 4px rgba(0, 0, 0, 0.2);'>";
  echo"<img src= 'image/profile_image/".$profile_picture."' alt= 'No profile picture yet' style='height:400px;width:300px;'>";
  echo"</div>";

  echo"<h3>Username: $username</h3>";
  echo"<h3>User Id: $id</h3>";
  echo "<h3>Email: $email</h3>";
  echo " <h3>Role: $role</h3>";
  echo " <h3>Post: $post_number</h3>";
  echo "<p>** User = 0, Admin = 1 **</p>";
  echo"</div>";

// user post table
  echo"<table class='admin_detail_table'>";
  echo"<tr>";
  echo " <th>ID</th>";
  echo  "<th>Title</th>";
  echo  "<th>Description</th>";
  echo  "<th>File</th>";
  echo  "<th>Timestamp</th>";
  echo  "<th>Likes</th>";
  echo  "<th>Categories</th>";
  echo  "<th>Captions</th>";
  echo  "<th>Option</th>";
  echo  "</tr>";


while($p = mysqli_fetch_array($user_post)){
  echo "<tr>";
  echo "<td>".$p['id']."</td>" ;
  echo "<td>".$p['title']."</td>" ;
  echo "<td>".$p['description']."</td>" ;
  echo "<td>".$p['file']."</td>" ;
  echo "<td>".$p['timestamp']."</td>" ;
  echo "<td>".$p['likes']."</td>" ;
  echo "<td>".$p['categories']."</td>" ;
  echo "<td>".$p['captions']."</td>" ;
  echo "<td ><a href=' admin_detail.php?delete_post=" .$p['id']." '><button class='btn_delete'>Delete</button></a></td>";
  echo "</tr>";
}

echo"</table>";
  echo"</div>";

}
?>

<?php
//delete post at admin.php
if (isset($_GET['delete_post'])) {
  $id = $_GET['delete_post'];

  $post_title = mysqli_query($con, "SELECT * FROM post WHERE id= '$id' ");
  $row = mysqli_fetch_array($post_title);


  echo "<h1 style='margin-top:100px;text-align:center;'>Are you sure you want to delete post \" ".$row["title"]." \" ? </h1>";

  echo"<form class=''  method='post'>";
    echo"<input type=hidden name='post_id' value='".$id."' >";
    echo"<button type='submit' name='PostDeleteYes' id='btn' >Yes</button>";
    echo"<button type='submit' name='PostDeleteNo' id='btn' >No</button>";
  echo"</form>";
}

if (isset($_POST['PostDeleteYes'])) {
    $id = $_POST['post_id'];
    $delete_post = mysqli_query($con, "DELETE FROM post WHERE id= '$id' ");
    $_SESSION['admin_post_notification'] = " Post Successfully Deleted!";
    header("location:admin.php");
}elseif(isset($_POST['PostDeleteNo'])){
    $_SESSION['admin_post_notification'] = "Post Delete Discard!";
    header("location:admin.php");
}

?>



<?php
//delete user
if (isset($_GET['delete_user'])) {
  $id = $_GET['delete_user'];

  $get_username = mysqli_query($con, "SELECT * FROM users WHERE id= '$id' ");
  $row = mysqli_fetch_array($get_username);


  echo "<h1 style='margin-top:100px;text-align:center;'>Are you sure you want to delete user\" ".$row["username"]." \" ?</h1>";
  echo "<h3 style='color:red;text-align:center;'>** WARNING: IF YOU DELETE THIS USER, ALL THE POST BY THIS USER WILL ALSO BE DELETE !! **</h3>";

  echo"<form class=''  method='post'>";
    echo"<input type=hidden name='post_id' value='".$id."' >";
    echo"<button type='submit' name='UserDeleteYes' id='btn' >Yes</button>";
    echo"<button type='submit' name='UserDeleteNo' id='btn' >No</button>";
  echo"</form>";
}


if (isset($_POST['UserDeleteYes'])) {
    $id = $_POST['post_id'];

    $post_user= mysqli_query($con, "SELECT * FROM users WHERE id= '$id' ");
    $row= mysqli_fetch_array($post_user);
    $username = $row["username"];

    mysqli_query($con, "DELETE FROM post WHERE username= '$username' ");
     mysqli_query($con, "DELETE FROM users WHERE id= '$id' ");
    $_SESSION['admin_post_notification'] = "User Successfully Deleted!";
    header("location:admin.php");
}elseif(isset($_POST['UserDeleteNo'])){
    $_SESSION['admin_post_notification'] = "User Delete Discard!";
    header("location:admin.php");
}



 ?>
