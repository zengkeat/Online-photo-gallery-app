<?php

//for preventing user access explore.php or account.php without login
if(!isset($_SESSION['login_user'])){
  header('location:login.php');
  session_write_close();
  exit();
}
// if this user post id more than zero then execute this code, else send a message say : you dont have any post yet!
if(mysqli_num_rows($get_user_info) > 0){

while ($user_info_row = mysqli_fetch_array($get_user_info)) {
echo "<div class='accoutn_container'>";

echo "<a href='postdetail.php?post_id=".$user_info_row['id']."'><img src='image/".$user_info_row['file']."' alt='Avatar' class='account_post_image' style='width:100%''></a>";

echo "<div class='middle'>";
// we must link it to the post.php file because the form is at there
// we have include the upload_listview_server.php at the top, so in the upload_listview_server.php file,
// we get the update/delete link and process it at there.
// echo "<div><a href='post.php?edit=".$user_info_row['id']."'></a></div>";
echo "<div><a href=' post.php?edit=" .$user_info_row['id']." '><button class='btn_update'>Update</button></a></div>";
echo "<div><a href=' post_delete.php?edit=" .$user_info_row['id']." '><button class='btn_delete'> Delete</button></a></div>";
echo "</div>";

echo "<div class='image_text_container'>";
echo "<h3 class='transparent_h3'>".$user_info_row['title']."</h3>";
echo "<p class='transparent_p'>".$user_info_row['description']."</p>";
echo "</div>";

echo "</div>";

}
}else{
  echo "<h1 class= 'SearchFail' > Oops! This user dont have any post yet! </h1>";
}

 ?>
