<?php include('upload_listview_server.php');
//the page title of every page
$pageTitle = "Delete Post";
?>

<?php include("base.php"); ?>

<h1 class="DeleteTitle">Are you sure you want to delete post "<?php echo $title ?>" ? </h1>

<form class=""  method="post">
  <input type="hidden" name="post_id" value="<?php echo $id ; ?>">
  <button type="submit" name="PostDeleteYes" id="btn" >Yes</button>
  <button type="submit" name="PostDeleteNo" id="btn" >No</button>
</form>
