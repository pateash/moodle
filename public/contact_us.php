<?php
    session_start();
    $cur_page="Contact Us";
     include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
 ?>
 <?php 
  $connection=connectDB();
  checkConnectivity();
  ?>
<div id="body">
  <div id="left_main">
  <br/>
    <?php  navigation()?>
  </div>
  <div id="center_main">
  <?php
//keval pahle var hi values set karni hai

   $first_name="";
   $last_name="";
   $email="";
   $question="";
 $errors=array();
	if(isset($_POST['first_name']))
	{
			$first_name=$_POST['first_name'];
	}
 is_valid($first_name,"first name");
	if(isset($_POST['last_name']))
	{
		$last_name=$_POST['last_name'];
	}
  is_valid($last_name,"last name");
	if(isset($_POST['email']))
	{
	       $email=$_POST['email'];
  }
 is_valid($email,"email Adress");
  if(!preg_match("/@/",$email))
    $errors[]="email should be valid(having @ sign in it)"; 
 if(isset($_POST['question']))
   $question=$_POST['question'];
 is_valid($question,"Question");
	 //var_dump($errors);
   if(!empty($errors))
   {
     
    echo "<div id=\"validation_errors\">";
      echo "<ul>";
    echo"<h2>&nbsp;&nbsp;Please follow these rules for entries</h2>";
     foreach($errors as $value)
     {
      echo "<li>$value</li>"; 
     }
     echo "</ul>";
     require_once("contact_us_form.php");    
       echo "</div>";
    }
  else{//to be happened if no error
  $query=" INSERT INTO contact_us ( first_name,last_name,email,question) ";
  $query.=" values('$first_name','$last_name','$email','$question'); ";
  $result=mysqli_query($connection,$query);
  if(!$result){
        echo "<div id=\"validation_errors\">";
           die( "Error ".mysqli_error($connection)." ".mysqli_errno($connection)."<br/>");
       echo "</div>";
  }
  else{
    ?>
    <h3  style="font-family:Segoe, sans-serif;  fontweight:normal;color:green;">Your Information has been submitted!<br/>
  Thank you,for sharing with us!!! </h3>
  <h3 style="font-family:Segoe, sans-serif;font-weight:normal;color:blue;">Feel Free to use Navigation to navigate:)</h3> 
 <?php
   }
  }
   ?>   
  </div>
  <div id="right_main">
<?php  right_main();   ?>
   </div>
     </div>
<?php include("../includes/layouts/footer.php"); ?>
