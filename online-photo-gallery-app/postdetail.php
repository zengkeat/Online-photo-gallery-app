<?php
include("upload_listview_server.php");
// css--> style.css
include("conn.php");

$pageTitle= "PostDetail";

if (isset($_GET['post_id'])) {
  // get the id of the post
  $post_id = $_GET['post_id'];
  $sqli = mysqli_query($con, "SELECT * FROM post WHERE id = '$post_id' ");

  if (count((array)$sqli) >= 1 ) {
    $n = mysqli_fetch_array($sqli);
    $title = $n['title'];
    $description = $n['description'];
    $file_name = $n['file'];
    $timestamp = $n['timestamp'];
    $username = $n['username'];
    $captions = $n['captions'];
    $likes = $n['likes'];


  }
}

 ?>


<?php include("base.php");

      echo "<div class='post_detail'>";
      echo "<h1>".$title."</h1>";
      echo "<img class='post_deail_image'  src='image/".$file_name."' >";
      echo "<p>"."<strong>".$username."</strong>"." ".$description."</p>";

      // this part is to make login user go to their own account if there click their own name.
      if($_SESSION['login_user'] != $username ){
        echo "<h3> <a href = 'user_account_detail.php?username=".$username."'  style='text-decoration:none;'><strong>@".$username."  </strong></a>".hashtag($captions)."</h3>";
      }else{
        echo "<h3> <a href = 'account.php'  style='text-decoration:none;'><strong>@".$username."  </strong></a>".hashtag($captions)."</h3>";
      }
      echo "<p>".$likes." <strong>likes</strong></p>";
      echo "<p style='float:right;margin:-50px 20px;'>".$timestamp."</p>";
      echo "</div>";

?>
