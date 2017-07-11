<head>
<meta content="en-us" http-equiv="Content-Language">
</head>

<?php include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
   $connection=connectDB();
   checkConnectivity();
 ?>

<div id="body">
  <div id="left_main">
  <?php  navigation();?>
   
  </div>
  <div id="center_main">
 <?php
        $error_id=-1;#default value
        if(isset($_GET['error_id']))
		    $error_id=$_GET['error_id'];
	     switch($error_id)
	     {
		   case NO_ACCOUNT:# this is code for no account 
            echo " <h2>  &nbsp;&nbsp;You don't have a Account..</h2>";
            echo "<h3>&nbsp;&nbsp;Create on by going to <a href='signup.php' style='font-weight:normal;text-decoration:none; color:green;'>SignUp page</a></h3>";
         break;
        case NOT_LOGGED_IN:#not logged in
          echo " <h2 style='font-weight:normal;'>  &nbsp;&nbsp;Please <a href='login.php'style='font-weight:normal;text-decoration:none; color:green;'>Log in</a> to continue..</h2>";
         break;
      default:
         echo " <h2>  &nbsp;&nbsp;Some error Occured..</h2>";
      
	    }?>
     
	
  </div>
  <div id="right_main">
    <?php right_main(); ?>
  </div>
  </div>
<?php include("../includes/layouts/footer.php"); ?>
