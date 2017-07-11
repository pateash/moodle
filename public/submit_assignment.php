<?php
 session_start();//at the starting of every page to tell open session file populate session super global with the values stored in it
     $cur_page="Posts";

     include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
     check_login();
     $connection=connectDB();
     checkConnectivity();
    //session will be continue until browser is closed
?>
<?php 
  if(isset($_GET['submission']))
  {
    if($_GET['submission']==1)
    {   
         $query="INSERT INTO assignments (title,student_id,teacher_id,file_name ) ";
         $query.=" VALUES( '{$_SESSION['post_title']}' , '{$_SESSION['id']}' , '{$_SESSION['poster_id']}', '{$_SESSION['file_name']}') ; ";
         $result=mysqli_query($connection,$query);
         confirm_query($result);
        $_SESSION['post_title']=null;//unsetting the variables which are not gonna to be used again 
        $_SESSION['file_name']=null;
        $_SESSION['poster_id']=null;
         echo "<script>alert('Assignment Submitted')</script>";
    }
    else
        echo "<script type='text/javascript'>alert('Some Error Occured...')</script>";
  }
  
 ?>


<?php 
#code for tackling file upload
  if(isset($_POST['upload']))//if upload is clicked
  {
    if(isset($_FILES['file']['name']))
    {
      $file_name=$_FILES['file']['name'];
      $_SESSION['file_name']=$file_name;
      $file_temp_location_name=$_FILES['file']['tmp_name'];
      if(move_uploaded_file($file_temp_location_name, 'uploads/'.$file_name)){
        redirect_to('submit_assignment.php?page_id='.$_GET['page_id'].'&submission=1');
       }
      else{
          redirect_to('submit_assignment.php?page_id='.$_GET['page_id'].'&submission=0');  
      }
    }
  }

 ?>
 <?php
 #these will be used to know where we have to go if prev or next has been clicked
if(!isset($_SESSION['next_ref']))
 $_SESSION['next_ref']=10000000;
 ?>
 <style type="text/css">
  #post{
     width: 740px;
     height: 160px;
   }
 #center_main{
 	width: 1150px;
 }
 
 </style>
<class >
<div id="body">
  <div id="left_main">
   <?php navigation(); ?>
  </div>
  <div id="center_main">
     <div id="all_posts">
         <?php
             if(isset($_GET['page_id'])) {
                 if ($_GET['page_id'] ==1)
                      $_SESSION['next_ref']=10000000;
                    show_submit_assignments();
                 $page_id=$_GET['page_id']+1;
              }
           else
               redirect_to("errors.php?error_id=".NOT_LOGGED_IN);
         ?>

         <div id="next"> <a href="submit_assignment.php?page_id=<?php echo $page_id; ?>"><?php echo htmlspecialchars("Next>>")?></div>
         <div id="back"> <a href="submit_assignment.php?page_id=1"><?php echo htmlspecialchars("<<Back")?></div>
     
     </div>
     </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
