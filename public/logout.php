<?php
    session_start();//at the starting of every page to tell open session file populate session super global with the values stored in it
    $cur_page="Log Out";
    include_once("../includes/layouts/header.php");
    require_once("../includes/functions.php");
   $connection=connectDB();
   checkConnectivity();
   ?>
 <div id="body">
 <div id="left_main"> 
 <?php
   $_SESSION['id']=null;
   $_SESSION['first_name']=null;
   $_SESSION['designation']=null;
 
 #here using simple navigation because at starting value will be set so it will show user, but after reloading it show simple
   show_simple_navigation();

  ?>
 </div>
 <div id="center_main">
 <h2 style="color:green;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logged Out Successfully...
 </h2>
 </div>
 <div id="right_main" >   
   <?php
      show_recent_posts();
   ?>
   <?php echo_space(25);?><a href="posts.php?page_id=1" style="color:burlywood ;font-size:20px">show all</a>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
