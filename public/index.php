<?php 
  session_start();
	#default value to be used when validation failed
  $scholar="";
  $first_name="";
  $last_name="";
  $about_you="";
  $profession='student';
	 ?>    
  <?php include_once("../includes/layouts/header.php");
        require_once("../includes/functions.php");
            $cur_page="index";
             if(isset($_SESSION['id'])){
        redirect_to('home.php'); 
  }
  else{
    echo " not set sesion";
  }
      $connection=connectDB();
      checkConnectivity();
      if(isset($_GET['error_id'])){
        if($_GET['error_id']=='login')
     echo '<script>alert("please Log In Or Sign Up")</script>';
   }
 ?>
  <style type="text/css">
 
#signup{
  position :absolute;
  top:310px;
  left: 50px;
}
#login{
  position :absolute;
  left: 50px;
}
  </style>
   <div id="body">
  <div id="left_main"><br/>
  <?php   navigation(); ?>
  </div>
      <div id="center_main" >
	 
       <?php require_once("login_form.php"); ?>
      <?php require_once("signup_form.php"); ?>
	    </div>
      <div id="right_main">
      <?php right_main();  ?>
      </div>
     </div>
        
<?php include("../includes/layouts/footer.php");?>