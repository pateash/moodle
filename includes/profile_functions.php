<?php 
 function show_info()
 {
   global $id;
   global $profession;
  #let take student as a default
  if(isset($_SESSION['id']) && isset($_SESSION['designation'])){
     $id=$_SESSION['id'];     
     $profession=$_SESSION['designation'];
   }
  else{
    ?>
    <h1>&nbsp;&nbsp;Please log in or Sign up</h1>
    <a href="./login.php">Log In </a>
    <a href="./signup.php">Sign Up </a>
 
 <?php
    exit;
  }
    $data_assoc=  get_data_by_id($id,$profession);
    ?>
  
  
   <div id="info">
   <h1 style="text-decoration: underline;">Profile</h1>
   <?php 
      $image=$data_assoc['profile_pic'];
    ?>
   <img style="background:white;"src="<?php echo './profile_pics/'.$image;?>" width="133" height="133" />
   
 <!--   form for uploading pic -->

    <form method="post" action="upload_pic.php" enctype="multipart/form-data">
      <strong>Update Profile Pic</strong>
      <input type="file" name="file">
     <?php echo_space(27); ?> <input  type="submit" name="upload" value="Upload"  >
    </form>
<!-- form end -->
   <br/>

  <p><span> Name - </span>&nbsp;<?php echo $data_assoc['first_name']." ".$data_assoc['last_name'] ?>
    </p><p><span>Designation - </span>&nbsp;
    <?php 
    if($profession=='student')
    echo "student";
    else
    echo "teacher" ;?>
   </p><p><?php if($profession=="student")
            echo "<span>Scholar Id</span> - ";
         else
            echo "<span>Employee Id</span> - ";
      ?>
      <?php echo $id ?>
      
   </p><p> <span>About</span>  <br/>
    <?php  echo $data_assoc['about_you'] ?>
    <hr/>
    </div>

 <?php
 }

 ?>

 <?php 
//this function update image name in database so that later new image may be loaded in profile
function update_image_name($file_name){
    global $connection;
    $query="UPDATE ";
    if($_SESSION['designation']=='student')
    $query.='student ';
    else
      $query.='teacher ';
    $query.="SET profile_pic= '{$file_name}' ";
    $query.="WHERE id={$_SESSION['id']}";
    $result=mysqli_query($connection,$query);
      if(!$result)//if some error has occured
        return false;
      else
        return true;
}
?>