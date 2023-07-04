<?php include('login_register_server.php');

//the page title of every page
$pageTitle = "Login";

?>

    <?php include('base.php'); ?>

    <!-- //notification when user succesfully register -->
    <?php if (isset($_SESSION['username'])): ?>
      <div class="notification">
      <?php echo 'Hi '.$_SESSION['username'].', yours registration is succesfull ! You can now Login.';
      // unset the $_SESSION to avoid the message showing everytime.
      unset($_SESSION['username']);
      ?>
      </div>
    <?php endif; ?>

    <div class="header">
    <h1 ><i class="fa fa-instagram" style="font-size:30px; margin-right:10px;"></i>InstaGiam</h1>
    </div>

    <form class=""  method="post">

      <?php include('errors.php'); ?>

      <div class="input-group">
      <input type="text" name="username" value=""  placeholder="Username" >
      </div>


      <div class="input-group">
      <input type="password" name="password" value=""  placeholder="Password">
      </div>


      <div class="input-group">
      <input type="submit" name="l_user" id="btn" value="Login">
      </div>

      <p class="input-group-p" >Haven't register yet? Register <a href="register.php">Here</a> </p>

    </form>

  </body>
</html>
