<!-- https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database -->
<?php
session_start();

// must set the initial variable, if not it doesnt have the value to put
// inside the value="<?php echo $username " in register.php
// eventually result in crash when you run backward from login.php
$username = "";
$email = "";
$errors = array();

  include('conn.php');


  // REGISTER USER
  //GRAB THE INPUT AND PERFORM THE VALIDATION
  // purpose of isset() is to check the object is being null or not
  if (isset($_POST['r_user'])) {
    // receive all input values from the form
    // purpose of 'mysqli_real_escape_string' is to escape special characters in a string
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password_1 = mysqli_real_escape_string($con, $_POST['password']);
    $password_2 = mysqli_real_escape_string($con, $_POST['c_password']);
    //split the password string for validation
    $password_count = str_split($password_1);

    //**test
    // print(count($password_count));
    // print_r($password_count);

    // form validation: ensure that the form is correctly filled
   // by adding (array_push()) corresponding error into $errors array
    if (empty($username)) {  array_push($errors, "Username is required");}
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) {
       array_push($errors, "Password is required");
     }elseif(count($password_count) <= 7 ){
       array_push($errors, "Password must atleast 8 character");
     }

    if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }


   // first check the database to make sure
   // a user does not already exist with the same username and/or email by LIMIT them by only 1
   $user_check = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
   //The mysqli_query() function performs a query against the database.
   //$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1");
   $result = mysqli_query($con, $user_check);
   //The mysqli_fetch_assoc() function fetches a result row as an associative array.
   $user = mysqli_fetch_assoc($result);

   if ($user) { // if user exists
     if ($user['username'] === $username) {
       array_push($errors, "Username already exists");
     }

     if ($user['email'] === $email) {
       array_push($errors, "email already exists");
     }
   }

   //**test
   // print_r($errors);
   // foreach($errors as $k => $v){
   //   echo $k. "=>". $v .'<br>';
   // }



   // Finally, register user if there are no errors in the form
   if (count((array)$errors) == 0) {
   	$password = md5($password_1);//encrypt the password before saving in the database

   	$sql = "INSERT INTO users (username, email, password,profile_picture)
   			  VALUES('$username', '$email', '$password',' ')";
   	mysqli_query($con, $sql);
    $_SESSION['username'] = $username;

    // redirect to login.html
    header('Location:login.php');
   }
 }

//LOGIN USER
 if (isset($_POST['l_user'])) {
   $username = mysqli_real_escape_string($con, $_POST['username']);
   $password = mysqli_real_escape_string($con, $_POST['password']);

   if (empty($username)) {
   	array_push($errors, "Username is required");
   }
   if (empty($password)) {
   	array_push($errors, "Password is required");
   }

   if (count((array)$errors) == 0) {
   	$password = md5($password);
    // select/grab/find the same ROW where "username" and "password" is equal to the
    // $username and $password that user type in.
   	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    //perform database query
   	$results = mysqli_query($con, $sql);

    //**test
    // $row = mysqli_num_rows($results);
    // print($row);

    // count how many row that "$result" match.
    //if the "$result" row that match to the database is == 1, then the user is valid,
    // to make sure there is only one "username" and 'password' row that match.
   	if (mysqli_num_rows($results) == 1) {

      // get the username from the database who login, and the username unique in the users table model
      $get_login_username = mysqli_query($con,"SELECT * FROM users WHERE username = '$username'");

      // fetch the row as an array
      $row =mysqli_fetch_array($get_login_username);
      // print_r($row);
      // then, get the "username" who login in the array, exp: [username] => Giam Zeng Keat
      $login_user = $row["username"];

      $_SESSION['login_user'] = $login_user;
   	  $_SESSION['success'] = $login_user;

      //check is this user a admin
      $admin_check =  mysqli_query($con,"SELECT * FROM users WHERE username = '$username' and role= 0 ");
      if(mysqli_num_rows($admin_check) == 1){
        $_SESSION['admin'] = $login_user ;
        $_SESSION['admin_success'] = 'Welcome Admin '.$login_user.' !';
        header('location: home.php');
      }else{
        header('location: home.php');
      }

   	}else {
   		array_push($errors, "Wrong username/password combination");
   	}
   }
 }
 ?>
