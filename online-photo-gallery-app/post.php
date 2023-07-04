<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
?>

<?php include('upload_listview_server.php');
//the page title of every page
$pageTitle = "Post";
?>

<?php include("base.php"); ?>

    <div class="header">
      <h1 ><i class="fa fa-instagram" style="font-size:30px; margin-right:10px;"></i>Post</h1>
      <p><strong >Share yours experice with us. </strong></p>
    </div>

    <form class=""  method="post" enctype="multipart/form-data">

      <?php include("errors.php") ?>


      <div class="input-group">
      <!-- put a hidden input for id, because when submit the update, we have the post id to grab  -->
      <input type="hidden" name="post_id" value="<?php echo $id ; ?>">
      <input type="text" name="title" value="<?php echo $title; ?>"  placeholder="Title" >
      </div>

      
     
      <div class="input-group">
      <p style="text-align:left;margin-left:10px;"><strong>Currently post:</strong>  <?php echo $file_name ?></p>
      <input type="file" name="file" value='<?php echo $file_name ?>' id="file" >
      </div>

      <div class="input-group">
      <select name="categories" >
        <option value="">Categories</option>
        <!-- check categories of post is what, then preselected it to the old result -->
        <option value="nature" <?php if($categories == "nature") echo "selected='selected'";  ?> >Nature</option>
        <option value="people" <?php if($categories == "people") echo "selected='selected'";  ?> >People</option>
        <option value="animal" <?php if($categories == "animal") echo "selected='selected'";  ?> >Animal</option>
        <option value="plant" <?php if($categories == "plant") echo "selected='selected'";  ?> >Plant</option>
        <option value="abstract" <?php if($categories == "abstract") echo "selected='selected'";  ?> >Abstract</option>
        <option value="others" <?php if($categories == "others") echo "selected='selected'";  ?> >Others</option>
      </select>
      </div>

      <div class="input-group">
      <textarea rows="4" cols="50" name="description"  placeholder="Description" ><?php echo $description ?></textarea>
      </div>

      <div class="input-group">
      <input type="text" name="captions" value="<?php echo $captions ?>"  placeholder="Captions: #some #example" >
      </div>


      <?php if ($update == true): ?>
          <div class="input-group">
	       <button id="btn" type="submit" name="update" >update</button>
       <?php else: ?>
          <div class="input-group">
	        <button  type="submit" name="ImageSubmit" id="btn" >Save</button>
        <?php endif ?>
      </form>

  </body>
</html>
