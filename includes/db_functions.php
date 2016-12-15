<?php
#database related funtions 
/* function for connecting to database*/
  function connectDB()
  {
     $connection=mysqli_connect("","","","");
     return $connection;	
  }
/*function for checking connectivity
*/  function checkConnectivity(){
  	global $connection;
	if(mysqli_connect_errno()){
       die( "Error ".mysqli_connect_error()." ".mysqli_connect_errno()."<br/>");
    }
  }
  /* function for confirming query*/
  function confirm_query($result)
  {
    global $connection;
    if(!$result)//if null returned due to some error
   {
      echo "<h2> Some error occured</h2> Error Code ".mysqli_error($connection);
      echo "</div></div>";
     include("../includes/layouts/footer.php");
     exit;
   }
  }
 /* function for returning full data of a given id */
  function get_data_by_id($id,$profession)
  {
    global $connection;
   if($profession=="student")
    $query=" SELECT * FROM student WHERE id = {$id} limit 1 ";
   else
    $query=" SELECT * FROM teacher WHERE id = {$id} limit 1 ";
    $result=mysqli_query($connection,$query);
   confirm_query($result);
   return mysqli_fetch_assoc($result);
  }
  
 ?>
