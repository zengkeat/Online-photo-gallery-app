<?php include('login_register_server.php');
  $pageTitle = "register";
?>

    <?php include('base.php'); ?>

    <div class="header">
    <h1 ><i class="fa fa-instagram" style="font-size:30px; margin-right:10px;"></i>InstaGiam</h1>
    <p><strong >Sign up for free. </strong>No credit card required.</p>
    </div>



    <form class=""  method="post">

      <?php include('errors.php'); ?>

      <div class="input-group">
      <input type="text" name="username" value="<?php echo $username ?>"  placeholder="Username" >
      </div>


      <div class="input-group">
      <input type="email" name="email" value="<?php echo $email ?>"   placeholder="Email" >
      </div>


      <div class="input-group">
      <input type="password" name="password" value="" placeholder="Password" >
      </div>


      <div class="input-group">
      <input type="password" name="c_password" value=""  placeholder="Confirm Password" >
      </div>


      <div class="input-group">
      <input type="submit" name="r_user" id="btn" value="GET STARTED">
      </div>

      <p class="input-group-p">Already a member? Login <a href="login.php">Here</a> </p>


    </form>
  </body>
</html>
