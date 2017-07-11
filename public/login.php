<?php
     session_start();//at the starting of every page to tell open session file populate session super global with the values stored in it
     $cur_page="Login";
     include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
 ?>\
 <style type="text/css">
#login{
   margin-left: 40px;
}
#left_main{
   height: 1220;
}
#right_main{
   height: 1220;
}

#center_main{
   height: 1215;
}

 </style>


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
	#for default value if given
	$id="";
	$password="";
	$profession="student";
	 ?>
    <?php
		  $errors=array();
	    if(!isset($_GET['trial'])){ //trial is to be used to know whether last time password was only thing not to match
		   if(isset($_POST['id']))
			    $id=$_POST['id'];
 	        if(isset($_POST['profession']))
		 		$profession=trim($_POST['profession']);
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
    	
	  #2-if numeric or not
		 	if(!is_numeric($id))
           {
       		if($profession=="student")	
       			 $errors[]="Scholar id need to be numeric";
       		else
       	   		$errors[]="Employee id need to be numeric";
           }
		   if($profession=='student')
      		  is_valid($id,'Scholar Number');
      	    else
      	      is_valid($id,'Employee Number');
      	    	#validate always either setted on not because if not setted then notify empty
	//for validating password
      	  #1-if value present or not
		   if(isset($_POST['password']))
		    $password=$_POST['password'];
			 is_valid($password,'Password');#validate always either setted on not
	     #2-if length of password is valid or not , password length is less than 6
           if(strlen($password)<6)
		    $errors[]="password length must be at least 6 characters "; 
   
     	     }
	       else
	     {
	     	$errors[]="Password do not match,please try again!!!";
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
		 echo "</ul></div><br/><br/><br/>";

		  require_once("login_form.php"); 
		  echo "</div>";
		  #place for displaying right_main
		  echo "<div id='right_main'>";
		  right_main();
		  echo "</div>";
 echo "</div>";
      include("../includes/layouts/footer.php");
      //for ending body tag
		  exit;
    }
	?>
     <?php
    $result_set=get_data_by_id($id,$profession);//this function returns set after checking result 
	if(mysqli_affected_rows($connection)==0){//no.of rows taken here we can't use count because it is not applicalicable on result object
		redirect_to("errors.php?error_id=".NO_ACCOUNT);
    }
    else
    {
    	
    	if($result_set['password']!=$password&&$result_set['id']==$id){//password passed is not currect but id exists
    		 $_SESSION['data']=$password ."!== ".$result_set['password'] ."id ".$id ;
             redirect_to("login.php?trial=".mt_rand());
		}
    	else
		{
			//storing data in session so that it could be used frequently
			$_SESSION['id']=$result_set['id'];
			$_SESSION['first_name']=$result_set['first_name'];
         	$_SESSION['designation']=$profession;
         
         if($profession=='student')
	       redirect_to("home.php");
	      else 
	       redirect_to("home.php"); 
		}
   
   	}
	?>   
     </div>
    </div>
<?php include("../includes/layouts/footer.php"); ?>
