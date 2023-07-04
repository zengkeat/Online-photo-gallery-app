<?php
// Start the session
session_start();

//the page title of every page
$pageTitle = "Home";

if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['username']);
   header("location: home.php");
 }

?>

  <?php include('base.php'); ?>

    <!-- notification when user login  -->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="notification">
      <?php echo 'Welcome to our Photo Gallery '.$_SESSION['success'].' !';
      // unset the $_SESSION to avoid the message showing everytime.
      unset($_SESSION['success']);
      ?>
      </div>
    <?php endif; ?>

<!-- // home page design -->

<div class="hero-image-home" >
  <div class="hero-text">
    <h1 style="font-size:50px">SEE IT IN ACTION</h1>
    <p>InstaGiam is trusted by some of the most inspiring professional photographers.</p>
  <?php if (!isset($_SESSION['login_user'])): ?>
    <a href="register.php"><button class="hero-text-btn">Let's start</button></a>
  <?php else: ?>
    <a href="account.php"><button class="hero-text-btn">Go to my account</button></a>
  <?php endif; ?>
  </div>
</div>


<div class="instagram">
  <div class="instagram-text">
      <h1>Experiencing memories</h1>
      <p>Create an insta in minutes. Relive your favorite photos and GIF anytime, as a photo or on any device.</p>
  </div>
  <img src="image/instagram.png" alt="">
</div>

<!-- smart Storytelling -->
<div class="SmartStorry">

  <div class="SmartStorryTitle">
    <h1>Smarter Storytelling</h1>
  </div>

  <div class="SmartStorryRow">
    <h1><i class="fa fa-thumbs-o-up" style="font-size:36px"></i>  Photos & GIF</h1>
    <p>Combine photos and GIF into beautiful post..</p>
  </div>

  <div class="SmartStorryRow">
    <h1><i class="fa fa-address-card-o" style="font-size:36px"></i> Smart design</h1>
    <p>Let our smart algorithms lay out your photo for you.</p>
  </div>

  <div class="SmartStorryRow">
    <h1><i class="fa fa-trophy" style="font-size:36px"></i>  Customize</h1>
    <p>Personalize your post to match any mood or style.</p>
  </div>

  <div class="SmartStorryRow">
    <h1><i class="fa fa-clock-o" style="font-size:36px"></i>  Print & Online</h1>
    <p>Relive it the way you prefer, online or in print..</p>
  </div>

  <div class="SmartStorryRow">
    <h1><i class="fa fa-calendar" style="font-size:36px"></i>  Privacy & Social</h1>
    <p>Your account and photo are private until you choose to share them.</p>
  </div>

  <div class="SmartStorryRow">
    <h1><i class="fa fa-universal-access" style="font-size:36px"></i> Free</h1>
    <p>This InstaGiam is a free application to share your memory to the world! </p>
  </div>

</div>


<!-- //amazing stories -->
<div class="AmazingStories">

  <div class="DiscoverStoriesTitle">
    <h1>Discover amazing stories</h1>
    <p>Trending stories by InstaGiam users from all over the world in our Curated Collection.</p>
  </div>

  <div class="PictureRow">
    <?php if (isset($_SESSION['login_user'])): ?>
      <a href="explore.php"><img src="image/download.gif" alt=""></a>
    <?php else: ?>
      <a href="login.php"><img src="image/download.gif" alt=""></a>
   <?php endif; ?>
   <div class="text">coffe</div>
  </div>

  <div class="PictureRow">
    <?php if (isset($_SESSION['login_user'])): ?>
      <a href="explore.php"><img src="image/cinema6.gif" alt=""></a>
    <?php else: ?>
      <a href="login.php"><img src="image/cinema6.gif" alt=""></a>
   <?php endif; ?>
   <div class="text">burning wood</div>
  </div>

  <div class="PictureRow">
    <?php if (isset($_SESSION['login_user'])): ?>
      <a href="explore.php"><img src="image/c14.gif" alt=""></a>
    <?php else: ?>
      <a href="login.php"><img src="image/c14.gif" alt=""></a>
   <?php endif; ?>
   <div class="text">cake making</div>
  </div>

</div>

<!-- //testimonials -->
<div class="Testimonials">

  <div class="TestimonialsTittle">
    <h1>Testimonials</h1>
  </div>

  <div class="TestimonialsRow">
   <?php if (isset($_SESSION['login_user'])): ?>
    <a href="user_account_detail.php?username=dongyu"><img src="image/dongyu.jpg" alt=""></a>
   <?php else: ?>
     <a href="login.php"><img src="image/dongyu.jpg" alt=""></a>
  <?php endif; ?>
   <p>Dong yu</p>
   <p>"This is the best social media i use in my life, recommended for anyone!"</p>
  </div>

  <div class="TestimonialsRow">
    <?php if (isset($_SESSION['login_user'])): ?>
     <a href="user_account_detail.php?username=giam"><img src="image/david.jpg" alt=""></a>
    <?php else: ?>
      <a href="login.php"><img src="image/david.jpg" alt=""></a>
   <?php endif; ?>
    <p>Giam</p>
    <p>"This fun service is swift, easy to use and offers some uniquely versatile options. It won't take 20 minutes to produce a picturesque story, so have a look."</p>
  </div>

  <div class="TestimonialsRow">
    <?php if (isset($_SESSION['login_user'])): ?>
     <a href="user_account_detail.php?username=Giam%20Zeng%20Keat"><img src="image/chenwu.jpg" alt=""></a>
    <?php else: ?>
      <a href="login.php"><img src="image/chenwu.jpg" alt=""></a>
   <?php endif; ?>
   <p>Giam Zeng Keat</p>
   <p>Quickly turn your pictures into elegant post to describe yours day."</p>
  </div>

</div>

<!-- //footer -->
<div class="pageBelow">

  <div class="pageBelowTitle">
  <h1>Photo Reinvented</h1>
  <p>The fastest way to your most beautiful photo. Share online or order as photo book.</p>
  </div>

  <div class="pageBelowWholeRow">

  <div class="pageBelowRow">
   <h3>InstaGiam</h3>
   <li><a href="home.php">Home</a></li>
   <li><a href="register.php">SignUp</a></li>
   <li><a href="login.php">Login</a></li>
  </div>

  <div class="pageBelowRow">
   <h3>Follow us</h3>
   <li><a href="https://www.facebook.com/">Facebook</a></li>
   <li><a href="https://twitter.com/">Twitter</a></li>
  </div>

  <div class="pageBelowRow">
   <h3>About us</h3>
   <p>California, Silicon Valley</p>
   <p>Email:InstaGiam@gmail.com</p>
   <p>Phone:03-87665426</p>
  </div>

  </div>

</div>
