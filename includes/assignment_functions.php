<?php 
#this function shows all posts in posts.php
function show_all_assignments(){
echo "<h1 style=\"text-decoration: none;\">&nbsp;&nbsp;&nbsp;&nbsp;Recent Assignments</h1>";  
global $connection;
//assign_flag=1 will be used for assignments otherwise everything will be same from posts
     $query="SELECT * FROM posts  WHERE id < ".$_SESSION['next_ref']." AND assign_flag=1 ORDER BY id DESC LIMIT 4 ";
$post_result=mysqli_query($connection,$query);
  confirm_query($post_result);
  echo "<ul style=\"list-style-type:none\">";
  if(mysqli_num_rows($post_result)==0)
    echo "No more Assignments to show,<br/> Click back to go to page 1:)";
while($post_data=mysqli_fetch_assoc($post_result))
  {
      $poster_data=  get_data_by_id($post_data['poster_id'],$post_data['poster_designation']);//getting data using student or teacher table for designation, name etc.
   echo "<li><div id=\"assignment\" style=\"background:lavender \">";
   ?>
    <h2 scope="col"><?php echo $post_data['post_title']."</h2>by <em>Prof.</em><span class= 'poster'> ".  $poster_data['first_name']." ".$poster_data['last_name']."</span>"; ?>
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
function new_assignment_form()
 {
  global $id;
  global $profession;
  ?>
    <div id="new_assignment">
      <h1> Assignment Post</h1>
      <?php 
      $url="add_assignment.php";
      ?>
     <form method="post" action=<?php echo $url; ?>>
        <span style="font-weight: bold;font-style: normal;text-decoration: none;">Assignment Title</span> 
        <input type="text " size="30" name="post_title" >
       <h3><span style="font-style: normal;text-decoration: none;">Content</span></h3>
     <textarea name="post_content" rows="10" cols="80">
       </textarea>
<br/>  <input type="submit" name="post_submit" value="Post"/>
       </form>
       </div>
  <?php
}
?>
<?php 
#this function shows all assignment in submit_assignment.php
function show_submit_assignments(){
echo "<h1 style=\"text-decoration: none;\">&nbsp;&nbsp;&nbsp;&nbsp;Submit Assignment</h1>";  
global $connection;
//assign_flag=1 will be used for assignments otherwise everything will be same from posts
     $query="SELECT * FROM posts  WHERE id < ".$_SESSION['next_ref']." AND assign_flag=1 ORDER BY id DESC LIMIT 1 ";
$post_result=mysqli_query($connection,$query);
  confirm_query($post_result);
  echo "<ul style=\"list-style-type:none\">";
  if(mysqli_num_rows($post_result)==0){
    echo "No more Assignments to show,<br/> Click back to go to page 1 (:";
  }
while($post_data=mysqli_fetch_assoc($post_result))
  {
      $poster_data=  get_data_by_id($post_data['poster_id'],$post_data['poster_designation']);//getting data using student or teacher table for designation, name etc.
   echo "<li><div id=\"submit_assignment\" style=\"background:lavender \">";
   ?>
    <h2 scope="col"><?php echo $post_data['post_title']."</h2>by <em>Prof.</em><span class= 'poster'> ".  $poster_data['first_name']." ".$poster_data['last_name']."</span>"; ?>
 <p><?php echo $post_data['post_content'] ?></p>
  <?php
  echo "</div></li>";
      $_SESSION['post_title']=$post_data['post_title'];//used to send in assignment table
      $_SESSION['poster_id']=$post_data['poster_id'];//used to send in assignment table
      $_SESSION['next_ref']=$post_data['id'];//used in navigation
  }
   if(mysqli_num_rows($post_result)!=0)
    { echo "<h3 style=\"text-decoration: none;\">&nbsp;&nbsp;&nbsp;&nbsp;Upload File</h3>";
   $url='submit_assignment.php?page_id='.$_GET['page_id'];//returning back to that page
   echo "<form action={$url} method='post' enctype='multipart/form-data'>";
   echo     "<input type='file' name='file'>";
   echo     "<input type='submit' name='upload' value='upload'>";
}
   echo "</form>";
     echo "</ul>";
   mysqli_free_result($post_result);
  }
  
?>
