<?php

$pageTitle = "Admin Page";
include("admin_detail.php");
include("base.php");
 ?>


 <!-- notification when user login  -->
 <?php if (isset($_SESSION['admin_success'])): ?>
   <div class="notification">
   <?php echo $_SESSION['admin_success'];
   // unset the $_SESSION to avoid the message showing everytime.
   unset($_SESSION['admin_success']);
   ?>
   </div>
 <?php endif; ?>

 <!-- notification when user delete something  -->
 <?php if (isset($_SESSION['admin_post_notification'])): ?>
   <div class="admin_notification_updated">
   <?php echo $_SESSION['admin_post_notification'];
   // unset the $_SESSION to avoid the message showing everytime.
   unset($_SESSION['admin_post_notification']);
   ?>
   </div>
   <!-- <br><br> -->
 <?php endif; ?>


<div class="count_row" style="width:100%;height:350px;">

  <!-- // count user, admin and post -->
  <?php
  include("conn.php");

  $get_user = mysqli_query($con, "SELECT * FROM users WHERE role=1 ");
  $count_users =  mysqli_num_rows($get_user);

  $get_post = mysqli_query($con, "SELECT * FROM post ");
  $count_posts =  mysqli_num_rows($get_post);

  $get_admin = mysqli_query($con, "SELECT * FROM users WHERE role=0 ");
  $count_admin =  mysqli_num_rows($get_admin);
   ?>

<div class="count_user" >
  <h1 >Available User </h1>
  <i class="fa fa-user-o"></i>
  <h1 class="number"><?php echo $count_users ?></h1>
</div>

<div class="count_post" >
  <h1 >Available Post </h1>
  <i class="fa fa-file-picture-o"></i>
  <h1 class="number"><?php echo $count_posts ?></h1>
</div>

<div class="count_admin" >
  <h1 style="margin-left:60px;"> Admin </h1>
  <i class="fa fa-address-book-o"></i>
  <h1 class="number"><?php echo $count_admin ?></h1>
</div>


</div>



<!-- // all user table-->
<div class="user_row">

  <div class="user_title">
    <h1 style="color:#484949;">User:</h1>
  </div>
  <!-- search -->
  <form class="search_form" method="post">
    Search: <input type="text" name="search" value="" placeholder="ID or username..">
    <input type="submit" name="AdminSearchSubmit" class="searchbtn" value="Search">
  </form>
<p style="font-size:15px;color:red;font-weight:bold;">** WARNING: ALL THE POSTS BY THE PARTICULAR USER ALSO WILL BE DELETED **</p>
   <table>
     <tr style="background-color:#227AB5;color:white;">
       <th>ID</th>
       <th>Username</th>
       <th>Email</th>
       <th>Profile_Picture</th>
       <th>Option</th>
     </tr>

     <?php
     if (!isset($_POST['AdminSearchSubmit'])) {

       $get_user_table = mysqli_query($con, "SELECT * FROM users WHERE role= 1 ");

       while($row = mysqli_fetch_array($get_user_table)){
         echo "<tr>";
         echo "<td>".$row['id']."</td>" ;
         echo "<td>".$row['username']."</td>" ;
         echo "<td>".$row['email']."</td>" ;
         echo "<td>".$row['profile_picture']."</td>" ;
         echo "<td  ><a href=' admin_detail.php?edit=" .$row['id']." '><button class='btn_update'>Detail</button></a></td";
         echo "<td  ><a href=' admin_detail.php?delete_user=" .$row['id']." '><button class='btn_delete'>Delete</button></a></td>";
         echo "</tr>";
       }

     }else{

       $get_search = $_POST['search'];
       $get_user_table = mysqli_query($con, "SELECT * FROM users WHERE (id = '$get_search' or username = '$get_search') and role= 1 ");

       if (mysqli_num_rows($get_user_table) == 1) {

       while($row = mysqli_fetch_array($get_user_table)){
         echo "<tr>";
         echo "<td>".$row['id']."</td>" ;
         echo "<td>".$row['username']."</td>" ;
         echo "<td>".$row['email']."</td>" ;
         echo "<td>".$row['profile_picture']."</td>" ;
         echo "<td ><a href=' admin_detail.php?edit=" .$row['id']." '><button class='btn_update'>Detail</button></a></td";
         echo "<td ><a href=' admin_detail.php?delete_user=" .$row['id']." '><button class='btn_delete'>Delete</button></a></td>";
         echo "</tr>";
       }

     }else{
       echo "Search not found!";
     }

  }

  ?>

   </table>
</div>



<!-- //all admin table-->
<div class="admin_row">

  <div class="admin_title">
    <h1 style="color:#484949;">Admin:</h1>
  </div>

   <table>
     <tr style="background-color:#4CB944;color:white;">
       <th >ID</th>
       <th>Username</th>
       <th>Email</th>
       <th>Profile_Picture</th>
       <th>Option</th>
     </tr>

     <?php
     $get_user_table = mysqli_query($con, "SELECT * FROM users WHERE role= 0 ");

     while($row = mysqli_fetch_array($get_user_table)){
       echo "<tr>";
       echo "<td>".$row['id']."</td>" ;
       echo "<td>".$row['username']."</td>" ;
       echo "<td>".$row['email']."</td>" ;
       echo "<td>".$row['profile_picture']."</td>" ;
       echo "<td ><a href=' admin_detail.php?edit=" .$row['id']." '><button class='btn_update'>Detail</button></a></td>";
       echo "</tr>";
     }
      ?>

   </table>
</div>




<!-- //all post table-->
<div class="post_row" >

  <div class="post_title">
    <h1 style="color:#484949;">Post:</h1>
  </div>

  <!-- search -->
  <form class="search_form" method="post">
    Search: <input type="text" name="search" value="" placeholder="ID,username,title,categories..">
    <input type="submit" name="AdminSearchPost" class="searchbtn" value="Search">
  </form>

   <table>
     <tr style="background-color:#D62F63;color:white;">
       <th>ID</th>
       <th>Username</th>
       <th>Title</th>
       <th>Description</th>
       <th>File</th>
       <th>Timestamp</th>
       <th>Likes</th>
       <th>Categories</th>
       <th>Captions</th>
       <th>Option</th>
     </tr>

     <?php
     if (!isset($_POST['AdminSearchPost'])) {

       $get_user_table = mysqli_query($con, "SELECT * FROM post ");

       while($row = mysqli_fetch_array($get_user_table)){
         echo "<tr>";
         echo "<td>".$row['id']."</td>" ;
         echo "<td>".$row['username']."</td>" ;
         echo "<td>".$row['title']."</td>" ;
         echo "<td>".$row['description']."</td>" ;
         echo "<td>".$row['file']."</td>" ;
         echo "<td>".$row['timestamp']."</td>" ;
         echo "<td>".$row['likes']."</td>" ;
         echo "<td>".$row['categories']."</td>" ;
         echo "<td>".$row['captions']."</td>" ;
         echo "<td ><a href=' admin_detail.php?delete_post=" .$row['id']." '><button class='btn_delete'>Delete</button></a></td>";
         echo "</tr>";
       }

     }else{

       $get_search = $_POST['search'];
       $get_user_table = mysqli_query($con, "SELECT * FROM post WHERE id = '$get_search' or username = '$get_search' or title = '$get_search' or categories = '$get_search'  ");

       if (mysqli_num_rows($get_user_table) >= 1) {

         while($row = mysqli_fetch_array($get_user_table)){
           echo "<tr>";
           echo "<td>".$row['id']."</td>" ;
           echo "<td>".$row['username']."</td>" ;
           echo "<td>".$row['title']."</td>" ;
           echo "<td>".$row['description']."</td>" ;
           echo "<td>".$row['file']."</td>" ;
           echo "<td>".$row['timestamp']."</td>" ;
           echo "<td>".$row['likes']."</td>" ;
           echo "<td>".$row['categories']."</td>" ;
           echo "<td>".$row['captions']."</td>" ;
           echo "<td ><a href=' admin_detail.php?delete_post=" .$row['id']." '><button class='btn_delete'>Delete</button></a></td>";
           echo "</tr>";
         }

     }else{
       echo "Search not found!";
     }

  }

?>

   </table>
</div>
