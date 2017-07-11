<?php require_once("../includes/db_functions.php") ?>
<?php require_once("../includes/navigation_functions.php") ?>
<?php require_once("../includes/post_functions.php") ?>
<?php require_once("../includes/assignment_functions.php") ?>
<?php require_once("../includes/profile_functions.php") ?>
<?php require_once("../includes/constants.php") ?>
<?php
#redirecting functions
function redirect_to($destination){
  	header("Location: ".$destination);
}
?>
<?php //function which checks if logged in or not
  function check_login(){
     if(!isset($_SESSION['id']))
      redirect_to("errors.php?error_id=".NOT_LOGGED_IN);
    }

 ?>
<?php
#validation function
function is_valid($input,$type){//return true of false as well as make a array which store all errors form global
	global $errors;
  if(isset($input)){//set bhi ho aur blank na ho
  	$input=trim($input);
    if($input!=='')
	  return true;
  }
  if(strtolower($type)=='password')
  $errors[]="$type can't be empty or Do not match";
 else
   $errors[]="$type can't be empty ";
   return false;
}
?>

<?php
#function for showing right main 
  function right_main(){
      show_recent_posts();
  }
?>
<?php
function echo_space($n){
  for($i=0;$i<$n;$i++)
      echo "&nbsp;";
}
?>

