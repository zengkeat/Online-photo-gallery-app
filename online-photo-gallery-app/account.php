<?php include('account_server.php'); ?>

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

    <form class="profile_form_div"  method="post" enctype="multipart/form-data">
      <?php include("errors.php"); ?>
      <input type="hidden" name="user_profile_id" value=" <?php echo $user_id ?> ">
      <input type="file" name="profile_picture" value="">
      <input type="submit" name="profile_picture_submit" value="Submit">
    </form>

    <p style="font-size:15px">insert/update profile picture</p>

  </div>
</div>

<div class="h1_galleries">
    <h1>Galleries:</h1>
</div>

<!-- notification when user update success  -->
<?php if (isset($_SESSION['post_notification'])): ?>
  <div class="notification_updated">
  <?php echo $_SESSION['post_notification'];
  // unset the $_SESSION to avoid the message showing everytime.
  unset($_SESSION['post_notification']);
  ?>
  </div>
  <br><br>
<?php endif; ?>

<!-- search -->
<form class="search_form" method="post">
    Search: <input type="text" name="search" value="" placeholder="Photo or title..">
  <input type="submit" name="SearchSubmit" class="searchbtn" value="Submit">
</form>

<!-- button group -->
<div class="explore-btn-group" >
  <a href='account.php?newest_post'>Newest</a>
  <a href="account.php?oldest_post">Oldest</a>
  <a href="account.php?likest_post">Most Likes</a>
</div>

<?php

include("conn.php");

// if user  click search button, then perform search
if(isset($_POST['SearchSubmit'])){

  $get_search = $_POST['search'];
  $account_user = $_SESSION['login_user'];

  // filter it by the title that user search and the name must be the same with the user that login
  $get_user_info = mysqli_query($con, "SELECT * FROM post WHERE (title = '$get_search' or categories = '$get_search') and username= '$account_user'  ORDER BY timestamp DESC");

  // if search result is more than zero than exexute this code, else print a message say :sorry, search not found
  if(mysqli_num_rows($get_user_info) > 0){

    include("account-post-template.php");
  }else{
    echo "<h1 class= 'SearchFail' > Sorry, search not found ! </h1>";
  }

}elseif(isset($_GET['newest_post'])){
  $account_user = $_SESSION['login_user'];
  $get_user_info = mysqli_query($con,"SELECT * FROM post WHERE username = '$account_user' ORDER BY timestamp DESC");

  include("account-post-template.php");

}elseif(isset($_GET['oldest_post'])){
  $account_user = $_SESSION['login_user'];
  $get_user_info = mysqli_query($con,"SELECT * FROM post WHERE username = '$account_user' ORDER BY timestamp ");

  include("account-post-template.php");

}elseif(isset($_GET['likest_post'])){
  $account_user = $_SESSION['login_user'];
  $get_user_info = mysqli_query($con,"SELECT * FROM post WHERE username = '$account_user' ORDER BY likes DESC ");

  include("account-post-template.php");

}else{
  // GET ALL OF THE POST FOR THIS LOGIN_USER
  $account_user = $_SESSION['login_user'];
  $get_user_info = mysqli_query($con,"SELECT * FROM post WHERE username = '$account_user' ORDER BY timestamp DESC");

  include("account-post-template.php");
}




?>
