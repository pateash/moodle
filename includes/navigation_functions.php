
<?php
#this is navigation function for left div
  function navigation(){

      if(!isset($_SESSION['id']))//if not logged in
        show_simple_navigation();
       else
        show_user_navigation();
      
  }
?>
<?php
   function show_simple_navigation(){

       echo "<div id='simple_navigation'>";
      $output="<br/><ul>";
      $output.="<li><a href=\"index.php\">Main Page</a></li>";
      $output.="<li><a href=\"signup.php\">Sign Up</a></li>";
      $output.="<li><a href=\"login.php\">Log in</a></li>";
      $output.="<li><a href=\"contact_us.php\">Contact Us</a></li>";
      $output.="<li><a href=\"about_us.php\">About Us</a></li>   ";
      $output.="</ul>";
      echo  $output;
      echo "</div>";
  
   }
   function show_user_navigation(){
     echo "<div id='user_navigation'>";
     echo "<br/>&nbsp;&nbsp; Logged in...<br/> ";
     echo echo_space(16);
     if($_SESSION['designation']=='student')
       echo " Er. ".$_SESSION['first_name'];
     else 
       echo "Prof. ".$_SESSION['first_name'];
        echo "</div>";

      $output="<br/><ul>";
      $output.="<li><a href=\"home.php\">Home</a></li>";
      $output.="<li><a href=\"assignments.php?page_id=1\">Assignments</a></li>";
      $output.="<li><a href=\"my_posts.php?page_id=1\">My Posts</a></li>";
      $output.="<li><a href=\"posts.php?page_id=1\">All Posts</a></li>";
      $output.="<li><a href=\"contact_us.php\">Contact Us</a></li>";
      $output.="<li><a href=\"about_us.php\">About Us</a></li>   ";
      $output.="<li><a href=\"logout.php\">Log Out</a></li>   ";
      $output.="</ul>";
      echo $output;
     echo "<br/>";
     echo "<h2>&nbsp;&nbsp;Assignments</h2>";
     echo "<ul>";
   if($_SESSION['designation']=='student')
     echo "<li><a href='submit_assignment.php?page_id=1'>+submit </a></li>";
   else
     echo "<li><a href='add_assignment.php'>+add </a></li>";
   
   echo"<li><a href=\"assignments.php?page_id=1\">view all</a></li>";
   if($_SESSION['designation']=='student'){
    echo"<li><a href=\"submitted_assignment.php\">Submitted</a></li>";
   }else{
   echo"<li><a href=\"responces_assignment.php\">Responces</a></li>";
    }   
    }
?>