<?php  
     include_once("../includes/layouts/header.php");
      require_once("../includes/functions.php");
?>
<div id="body">
  <div id="left_main"><br/>
  <?php   navigation(); ?>
  </div>
  <div id="center_main">
    <?php
		$connection=connectDB();
		checkConnectivity();
	?>
	<?php 
	#default value to be used when validation failed
  $id="";
  $first_name="";
  $last_name="";
  $about_you="";
  $password1="";
  $password2="";
  $profession="student";
	 ?>         
	 <!-- writing costume css for signup_form in signup.php-->
   <style type="text/css">
    #signup{
    	 position :absolute;
   top:200px;
  left: 50px;
         }
  h3{
   font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  }
        </style>
  
    <?php
	        if(isset($_POST['id']))
			$id=$_POST['id'];
			 if(isset($_POST['profession']))
			$profession=$_POST['profession'];
			 if(isset($_POST['first_name']))
			$first_name=$_POST['first_name'];
			 if(isset($_POST['last_name']))
			$last_name=$_POST['last_name'];
			 if(isset($_POST['password1']))
		    $password1=$_POST['password1'];
			 if(isset($_POST['password2']))
		    $password2=$_POST['password2'];
			if(isset($_POST['about_you']))
			$about_you=nl2br($_POST['about_you']);
      //nl2br() ,so the newline entered by user converted in to <br> and stored,so when we print we get the same 
			$errors=array();
			
      	is_valid($id,'Scholar/Employee id');
    	 	is_valid($first_name,'First name');
	  		is_valid($last_name,'Last name');
	 		$password1=trim($password1);
	 		$password2=trim($password2);
      //validating passwords
	   #1- if password blank or do not match
	  if($password1!=$password2||$password1==="")
		 $errors[]="Invalid Password or Don't Match";
     #2- if password length is less than 6
      if(strlen($password1)<6)
		 $errors[]="password length must be at least 6 characters "; 
   
   //validating id 
     #1-length of id
    if($profession=='student'){
      if(strlen($id)!=9)
		 $errors[]=" Scholar/Employee id must be of 9/5 characters respectively"; 
     }
     else{
     if(strlen($id)!=5)
      $errors[]="Scholar/Employee id must be of 9/5 characters respectively"; 
     }
     #2-if numeric 
     if(!is_numeric($id))
     {
       	if($profession=='student')	
       		$errors[]="Scholar id need to be numeric";
       	else
       	   	$errors[]="Employee id need to be numeric";
     }
if(!empty($errors))
	{
		echo "<div id=\"validation_errors\">";
		  echo "<ul>";
		echo"<h2>Please follow these rules for entries</h2>";
          foreach($errors as $value)
		 {
			echo "<li>$value</li>"; 
		 }
		 echo "</ul>";
 		 echo "</div>";

		 require_once("signup_form.php");
         echo   "</div> ";//for ending center main
  
		  #place for displaying right_main
		  echo "<div id='right_main'>";
		  right_main();
		  echo "</div>";
      echo "</div>";  //for ending body-div tag
    include("../includes/layouts/footer.php");
  
    exit;	 
	}
	?>
     <?php
     //if not errors then start 
     if($profession=='student')
	 $query=" INSERT INTO student ( id,password,first_name,last_name,about_you) ";//prefession will become name of table
    else
    $query=" INSERT INTO teacher ( id,password,first_name,last_name,about_you) ";//prefession will become name of table	
	$query.=" values($id,'$password1','$first_name','$last_name','$about_you'); ";
	$result=mysqli_query($connection,$query);
	if(!$result){
	      echo "<div id=\"validation_errors\">";
		     if($profession=="student")
		     	echo "<h2 style=\" font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;\">&nbsp;&nbsp;Scholar Number already Present...</h2> ";
		     else
		     	echo "<h2 style=\" font-family: \"Segoe UI\", Tahoma, Geneva, Verdana, sans-serif;\">&nbsp;&nbsp;Employee Id already Present...</h2>";
        ?>
        <?php
		  echo "</div>";
	}
	else{
		  echo "<h2 style='color:green'>&nbsp;&nbsp;&nbsp;&nbsp;Success , Log in to continue...</h2>";

	      }
	 ?>   
     </div>
     <div id="right_main">
      <?php right_main(); ?>
     </div>
     </div>
<?php include("../includes/layouts/footer.php"); ?>
