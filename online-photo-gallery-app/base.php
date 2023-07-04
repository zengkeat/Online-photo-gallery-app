<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jquery script for ajax -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="admin.css">
    <title> <?php echo $pageTitle; ?> </title>
  </head>
  <!-- if i do it this way </html> and </body> will be missing, but html5 doesnt care -->
</body>

  <nav class="navbar">
    <a href="home.php" class='brand'><i class="fa fa-instagram" style="font-size:30px; margin-right:10px;"></i>InstaGiam</a>

    <div class="floatright" >

      <?php if(isset($_SESSION['admin'])): ?>
      <a href="admin.php" >Admin</a>
      <?php endif; ?>

    <?php if(isset($_SESSION["login_user"])): ?>
    <a href="explore.php" >Explore</a>
    <div class="dropdown" >
        <button class="dropbtn"> <?php echo $_SESSION["login_user"]; ?> <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-content">
          <a href="account.php">My Account</a>
          <a href="post.php">Post</a>

          <!-- if someone press the this logout link, if(isset($_GET["logout"])) at the home.php will get logout  -->
          <!-- href and perform the redirect -->
          <a href="home.php?logout='1'">Logout</a>
      </div>
    </div>
    </div>

<?php else: ?>
<a href="login.php">Login</a>
<a href="register.php">Signup</a>
<?php endif; ?>

</nav>
