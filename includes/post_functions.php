
 <?php 
 #this function allows to post new post
 function new_post_form()
 {
  global $id;
  global $profession;
  ?>
    <div id="new_post">
      <h1> New Post</h1>
     <form method="post" action='home.php'>
        <span style="font-weight: bold;font-style: normal;text-decoration: none;">Post Title</span> 
        <input type="text " size="30" name="post_title" >
       <h3><span style="font-style: normal;text-decoration: none;">Content</span></h3>
     <textarea name="post_content" rows="10" cols="50">
       </textarea>
 <br/>  <input type="submit" name="post_submit" value="Post"/>
       </form>
       </div>
  <?php
}
?>
<?php 
  #function for showing recent post
function show_recent_posts(){
  echo "<h1 >&nbsp;&nbsp;Recent Posts</h1> ";
  global $connection;
  $query="SELECT * FROM posts WHERE assign_flag=0 ORDER BY id DESC LIMIT 5 ";
  $post_result=mysqli_query($connection,$query);
  confirm_query($post_result);
  echo "<ul style=\"list-style-type:none\">";
  while($post_data=mysqli_fetch_assoc($post_result))
  {
   echo "<li><div id=\"post\">"; 
  $poster_data=  get_data_by_id($post_data['poster_id'],$post_data['poster_designation']);//getting data using student or teacher table for designation, name etc.
   ?>
   <h2 scope="col"><?php echo $post_data['post_title']." </h2>by <span class='poster'>". $poster_data['first_name']." ".$poster_data['last_name']."</span>(".$post_data['poster_designation'].")"  ?>
 <p><?php echo $post_data['post_content'] ?></p>
  <?php
  echo "</div></li>";
  }
  echo "</ul>";
  echo_space(25);
  echo "<a href=\"posts.php?page_id=1\" style=\"color:burlywood ;font-size:20px\">show all</a>";
  mysqli_free_result($post_result);
  }
?>
<?php 
  #function for showing my recent post
function show_my_recent_posts()
{
    global $connection;
    global $id;//for filtering result using id
    $query = "SELECT * FROM posts WHERE poster_id=$id AND assign_flag=0 ORDER BY id DESC LIMIT 4 ";
    $post_result = mysqli_query($connection, $query);
    confirm_query($post_result);
    if (mysqli_num_rows($post_result) == 0)
        echo echo_space(6)."no posts to display<br/><br/>";
    else {
        echo "<ul style=\"list-style-type:none\">";
        while ($post_data = mysqli_fetch_assoc($post_result)) {
            echo "<li><div id=\"post\" style=\"background:lavender \">";
            ?>
            <h2 scope="col"><?php echo $post_data['post_title'] ?></h2>
            <p><?php echo $post_data['post_content'] ?></p>
            <?php
            echo "</div></li>";
        }
        echo "</ul>";
        mysqli_free_result($post_result);
    }
}
?>
<?php 
#this function shows all my posts in my_posts.php
function show_all_my_posts(){
  $id=$_SESSION['id'];
echo "<h1 style=\"text-decoration: none;\">&nbsp;&nbsp;&nbsp;&nbsp;My Recent posts</h1>";  
global $connection;
     $query="SELECT * FROM posts  WHERE poster_id=$id AND id < ".$_SESSION['next_ref']." AND assign_flag=0 ORDER BY id DESC LIMIT 5 ";
$post_result=mysqli_query($connection,$query);
  confirm_query($post_result);
  echo "<ul style=\"list-style-type:none\">";
  if(mysqli_num_rows($post_result)==0)
    echo "No more posts to show,<br/> Click back to go to page 1:)";
while($post_data=mysqli_fetch_assoc($post_result))
  {
      $poster_data=  get_data_by_id($post_data['poster_id'],$post_data['poster_designation']);//getting data using student or teacher table for designation, name etc.
   echo "<li><div id=\"post\" style=\"background:lavender \">";
   ?>
    <h2 scope="col"><?php echo $post_data['post_title']."</h2>by <span class= 'poster'>".  $poster_data['first_name']." ".$poster_data['last_name']."</span>(".$post_data['poster_designation'].")"  ?>
 <p><?php echo $post_data['post_content'] ?></p>
  <?php
  echo "</div></li>";
      $_SESSION['next_ref']=$post_data['id'];
  }
  echo "</ul>";
   mysqli_free_result($post_result);
  }
?>

<?php 
#this function shows all posts in posts.php
function show_all_posts(){
echo "<h1 style=\"text-decoration: none;\">&nbsp;&nbsp;&nbsp;&nbsp;Recent posts</h1>";  
global $connection;
     $query="SELECT * FROM posts  WHERE id < ".$_SESSION['next_ref']." AND assign_flag=0 ORDER BY id DESC LIMIT 5 ";
$post_result=mysqli_query($connection,$query);
  confirm_query($post_result);
  echo "<ul style=\"list-style-type:none\">";
  if(mysqli_num_rows($post_result)==0)
    echo "No more posts to show,<br/> Click back to go to page 1:)";
while($post_data=mysqli_fetch_assoc($post_result))
  {
      $poster_data=  get_data_by_id($post_data['poster_id'],$post_data['poster_designation']);//getting data using student or teacher table for designation, name etc.
   echo "<li><div id=\"post\" style=\"background:lavender \">";
   ?>
    <h2 scope="col"><?php echo $post_data['post_title']."</h2>by <span class= 'poster'>".  $poster_data['first_name']." ".$poster_data['last_name']."</span>(".$post_data['poster_designation'].")"  ?>
 <p><?php echo $post_data['post_content'] ?></p>
  <?php
  echo "</div></li>";
      $_SESSION['next_ref']=$post_data['id'];
  }
  echo "</ul>";
   mysqli_free_result($post_result);
  }

?>

