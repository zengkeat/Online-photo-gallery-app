<?php

include("conn.php");
session_start();

//for preventing user access explore.php or account.php without login
if(!isset($_SESSION['login_user'])){
  header('location:login.php');
  session_write_close();
  exit();
}

if(isset($_GET['username'])){
  $account_user = $_GET['username'];
  $get_account_info = mysqli_query($con,"SELECT * FROM users WHERE username = '$account_user' ");
  $user = mysqli_fetch_array($get_account_info);
  $user_username = $user['username'];
  $email = $user['email'];
  $user_id = $user['id'];
  $user_picture =$user['profile_picture'];

  $pageTitle= $account_user.' Profile';
}
 ?>

<?php include("base.php"); ?>

<div class="account-hero-image">
  <div class="hero-text">

    <!-- if $user_picture exist, then show the picture, if then is not profile picture in their account, picture wont show. -->
    <?php if ($user_picture): ?>
      <div class="account_image">
      <img src=" <?php echo 'image/profile_image/'.$user_picture ?>" alt="">
      </div>
    <?php endif; ?>

    <p style="font-size:25px;color:white;"><?php echo $user_username; ?></p>
    <p style="font-size:25px;color:white;"> <?php echo $email; ?> </p>

  </div>
</div>

<div class="h1_galleries">
    <h1>Galleries:</h1>
</div>


<?php

include("conn.php");


  // GET ALL OF THE POST FOR THIS USER
  $get_user_info = mysqli_query($con,"SELECT * FROM post WHERE username = '$user_username' ORDER BY timestamp DESC");

  // if this user post id more than zero then execute this code, else send a message say : you dont have any post yet!
  if(mysqli_num_rows($get_user_info) > 0){

  while ($user_info_row = mysqli_fetch_array($get_user_info)) {
  echo "<div class='accoutn_container'>";

  echo "<a href='postdetail.php?post_id=".$user_info_row['id']."'><img src='image/".$user_info_row['file']."' alt='Avatar' class='account_post_image' style='width:100%''></a>";

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
