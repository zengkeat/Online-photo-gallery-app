<?php include("upload_listview_server.php");
  $pageTitle = "Explore";

 ?>
<?php include("base.php"); ?>

 <!-- top hero image -->
<div class="hero-image" >
  <div class="hero-text">
    <h1 style="font-size:50px">Welcome to InstaGiam</h1>
    <p>Share your's experince with us</p>
  <?php if (!isset($_SESSION['login_user'])): ?>
    <a href="login.php"><button>Log in</button></a>
  <?php else: ?>
    <a href="post.php"><button class="hero-text-btn">Let's Post now</button></a>
  <?php endif; ?>
  </div>
</div>

  <!-- search -->
  <form class="search_form" method="post">
    Search: <input type="text" name="search" value="" placeholder="Photo, people or title..">
    <input type="submit" name="SearchSubmit" class="searchbtn" value="Search">
  </form>

  <!-- button group -->
  <div class="explore-btn-group" >
    <a href='explore.php?trending'>Trending</a>
    <a href="explore.php?fresh">Fresh</a>
    <div class="explore-dropdown" >
        <button class="explore-dropbtn" >Categories<i class="fa fa-caret-down"></i></button>
        <div class="explore-dropdown-content">
          <a href="explore.php?nature">Nature</a>
          <a href="explore.php?people">People</a>
          <a href="explore.php?animal">Animal</a>
          <a href="explore.php?plant">Plant</a>
          <a href="explore.php?abstract">Abstract</a>
          <a href="explore.php?others">Others</a>
      </div>
  </div>
</div>


  <?php


    if(isset($_POST['SearchSubmit'])){
      $get_search = $_POST['search'];
      $get_post = mysqli_query($con, "SELECT * FROM post WHERE title = '$get_search' or username ='$get_search' or categories='$get_search' ORDER BY timestamp DESC");

      if(mysqli_num_rows($get_post) > 0){

        include("explore-post-template.php");
      }else{
        echo "<h1 class= 'SearchFail' > Sorry, search not found ! </h1>";
      }


  }elseif(isset($_GET['trending'])){
    $get_post = mysqli_query($con, "SELECT * FROM post ORDER BY likes DESC");

    include("explore-post-template.php");

  }elseif(isset($_GET['fresh'])){
    $get_post = mysqli_query($con, "SELECT * FROM post ORDER BY timestamp DESC"); //order by timestamp-desceding order

    include("explore-post-template.php");

  }elseif(isset($_GET['nature'])){
    $get_post = mysqli_query($con, "SELECT * FROM post WHERE categories ='nature' ");
    echo "<h1 style='font-family:serif;margin:30px 0 -20px 90px;color:#116b3b; '>Category \"Nature\"</h1>";
    include("explore-post-template.php");

  }elseif(isset($_GET['people'])){
    $get_post = mysqli_query($con, "SELECT * FROM post WHERE categories ='people' ");
    echo "<h1 style='font-family:serif;margin:30px 0 -20px 90px;color:#116b3b; '>Category \"People\"</h1>";
    include("explore-post-template.php");

  }elseif(isset($_GET['animal'])){
    $get_post = mysqli_query($con, "SELECT * FROM post WHERE categories ='animal' ");
    echo "<h1 style='font-family:serif;margin:30px 0 -20px 90px;color:#116b3b; '>Category \"Animal\"</h1>";
    include("explore-post-template.php");

  }elseif(isset($_GET['plant'])){
    $get_post = mysqli_query($con, "SELECT * FROM post WHERE categories ='plant' ");
    echo "<h1 style='font-family:serif;margin:30px 0 -20px 90px;color:#116b3b; '>Category \"Plant\"</h1>";
    include("explore-post-template.php");

  }elseif(isset($_GET['abstract'])){
    $get_post = mysqli_query($con, "SELECT * FROM post WHERE categories ='abstract' ");
    echo "<h1 style='font-family:serif;margin:30px 0 -20px 90px;color:#116b3b; '>Category \"Abstract\"</h1>";
    include("explore-post-template.php");

  }elseif(isset($_GET['others'])){
    $get_post = mysqli_query($con, "SELECT * FROM post WHERE categories ='others' ");
    echo "<h1 style='font-family:serif;margin:30px 0 -20px 90px;color:#116b3b; '>Category \"Others\"</h1>";
    include("explore-post-template.php");

  }elseif(isset($_GET['captions'])){
    $hashtag = $_GET['captions'];

    // add a "#" in front of the $hashtag because the captions we get doesnt have "#" at the front of the word,
    // so add "#" in front of the $hashtag then i can filter the captions field correctly.
    $get_post = mysqli_query($con, "SELECT * FROM post WHERE captions LIKE '%#$hashtag%' ");
    echo "<h1 style='font-family:serif;margin:30px 0 -20px 90px;color:#116b3b; '>All the result of \"#".$hashtag."\"</h1>";
    include("explore-post-template.php");

  }else{
    $get_post = mysqli_query($con, "SELECT * FROM post ");
    include("explore-post-template.php");
  }

   ?>



   <!-- Add Jquery to page -->
   <script src="jquery.min.js"></script>
   <script>
   // **like button javascript ajax **
   	$(document).ready(function(){
   		// when the user clicks on like
   		$('.like').on('click', function(){
   			var postid = $(this).data('id');
   			    $post = $(this);

   			$.ajax({
   				url: 'explore.php',
   				type: 'post',
   				data: {
   					'liked': 1,
   					'postid': postid
   				},
   				success: function(response){
   					$post.parent().find('span.likes_count').text(response + " likes");
   					$post.addClass('hide');
   					$post.siblings().removeClass('hide');
   				}
   			});
   		});

   		// when the user clicks on unlike
   		$('.unlike').on('click', function(){
   			var postid = $(this).data('id');
   		    $post = $(this);

   			$.ajax({
   				url: 'explore.php',
   				type: 'post',
   				data: {
   					'unliked': 1,
   					'postid': postid
   				},
   				success: function(response){
   					$post.parent().find('span.likes_count').text(response + " likes");
   					$post.addClass('hide');
   					$post.siblings().removeClass('hide');
   				}
   			});
   		});
   	});

   </script>

  <!-- <script>

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("img_title");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

}
</script> -->

 </body>
</html>
