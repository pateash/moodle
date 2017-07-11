<?php
   session_start();//at the starting of every page to tell open session file populate session super global with the values stored in it
     $cur_page="Home";
    
 include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
   ?>
 <?php 
  $connection=connectDB();
  checkConnectivity();
  $id=0;
  $profession="student";
  ?>
  <?php 
  //code of checking logged in or not
   if(isset($_SESSION['id']))
    $flag=true;
   else
    $flag=false; 

  /* Code for tackling if post is being submitted*/
  if(isset($_POST['post_submit'])){
      $errors=array();
      if(isset($_POST['post_title']))
      is_valid($_POST['post_title'],'Post Title');
       if(isset($_POST['post_title']))
      is_valid($_POST['post_content'],'Post Content');
  //if $error is empty
      $query=" INSERT INTO posts (poster_id,post_title,poster_designation,post_content) ";
      if($_SESSION['designation']=='student')
         $poster_designation='student';
      else
         $poster_designation='teacher';
       $title=$_POST['post_title'];
       $content=$_POST['post_content'];
      $query.= "values ({$_SESSION['id']},'$title','$poster_designation','$content') ";
      if(empty($errors))
     $post_query_result=mysqli_query($connection,$query);
  }
  ?>
  <style type="text/css">
   span{
    font-style: italic;
    font-family: sans-serif;
    font-weight: bold;
    text-decoration: underline;
   }
   
  </style>
<div id="body">
 <div id="left_main"> <?php  navigation() ?></div>
 <div id="center_main">
    <?php
    //for displaying message if assignment is successful
     if(isset($_GET['assignment']))
     {
       echo "<strong style='color:green'>&nbsp;&nbsp;&nbsp;&nbsp;Assignment Posted Successfully...</strong>";
     }
      ?>
     <?php
     if($flag==true) 
      show_info();
     else{
      echo "<h2 style='font-weight:normal'>&nbsp;&nbsp;Please <a href='login.php' style='color:green'>Log in</a> to continue...</h2>";
      echo "</div>";#ending center_main div
   echo "<div id=\"right_main\" >";
      show_recent_posts();
      echo_space(25);?>
      <a href="posts.php?page_id=1" style="color:burlywood ;font-size:20px">show all</a> 
      </div>
   <?php
   exit;
    }
     ?>
 <?php 
 if(isset($_POST['post_submit'])){
      if(!empty($errors)) {
       
      echo "<div id=\"new_assignment\" style='color:blue'>";
      echo "<ul>";
    echo"<h2>Please follow these rules for entries</h2>";
          foreach($errors as $value)
     {
      echo "<li>$value</li>"; 
     }
     echo "</ul>";
     echo "</div>";
      }//if errors then display errors and then print form, if no errors then confirm query
    else{
         confirm_query($post_query_result);
       ?>
       <div id="new_post"><h3 style="color:green">Post submitted Successfullly....</h3></div>
     
     <?php
     }
   }
//
     ?>
     <?php new_post_form();

     ?>
     <div id="my_posts">
         <h3 style="text-decoration: underline;">Your Recent posts</h3>
         <?php 
          show_my_recent_posts();
        ?>
         <?php echo_space(25);?><a href="my_posts.php?page_id=1">show all</a>
     </div>
 </div>
 <div id="right_main" >   
   <?php
      right_main();
   ?>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
