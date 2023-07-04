<?php

while ($row = mysqli_fetch_array($get_post)) {
echo "<div id='img_div'>";
// echo "<img class='image'  src='image/".$row['file']." ' >";
echo "<a href = 'postdetail.php?post_id=".$row['id']."' ><img class='image' src='image/".$row['file']."' ></a>";
echo "<div id='img_title'>";
echo $row['title'];
echo "<div id='img_text'>";
echo "<p><strong>".$row['username']."</strong> ".$row['description']."</p>";

//hashtag
// this part mean when login user click their @name at explore.php post, it will link the login  user to their own account instead of
// their version of user_account_detail.php 
if($_SESSION['login_user'] == $row['username'] ){
  echo "<p><a href = 'account.php' style='text-decoration:none;color:blue;'><strong>@".$row['username']." </strong></a>".hashtag($row['captions'])."</p>";
}else{
    echo "<p><a href = 'user_account_detail.php?username=".$row['username']."' style='text-decoration:none;color:blue;'><strong>@".$row['username']." </strong></a>".hashtag($row['captions'])."</p>";
}


//likes_button
//css in account.css
// determine if user has already liked this post
$results = mysqli_query($con, "SELECT * FROM likes WHERE userid= ".$user_id." AND postid=".$row['id']."");
if (mysqli_num_rows($results) == 1 ){
  // user already likes post
echo "<span class='unlike fa fa-thumbs-up' data-id=".$row['id']."></span> ";
echo "<span class='like hide fa fa-thumbs-o-up' data-id=".$row['id']."></span> ";
}else{
// <!-- user has not yet liked post -->
echo "<span class='like fa fa-thumbs-o-up' data-id=".$row['id']."></span> ";
echo "<span class='unlike hide fa fa-thumbs-up' data-id=".$row['id']."></span> ";
 }
echo "<span class='likes_count'> ".$row['likes']." likes</span>";

echo "<p style='float:right;margin-top:0px;'>".$row['timestamp']."</p>";
echo "</div>";
echo "</div>";
echo "</div>";
}


 ?>
