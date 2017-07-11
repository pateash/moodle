<?php
 session_start();//at the starting of every page to tell open session file populate session super global with the values stored in it
     $cur_page="Posts";

include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
    // check_login();
     $connection=connectDB();
     checkConnectivity();
    //session will be continue until browser is closed
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
   <?php  navigation(); ?>
  </div>
  <div id="center_main">
     <div id="all_posts">
         <?php

             if(isset($_GET['page_id'])) {
                 if ($_GET['page_id'] ==1)
                      $_SESSION['next_ref']=10000000;
                    show_all_assignments();
                 $page_id=$_GET['page_id']+1;
             }
           else
               redirect_to("index.php");

         ?>

         <div id="next"> <a href="assignments.php?page_id=<?php echo $page_id; ?>"><?php echo htmlspecialchars("Next>>")?></div>
         <div id="back"> <a href="assignments.php?page_id=1"><?php echo htmlspecialchars("<<Back")?></div>
     
     </div>
     </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
