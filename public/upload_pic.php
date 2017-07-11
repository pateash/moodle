<?php
   session_start();//at the starting of every page to tell open session file populate session super global with the values stored in it
     $cur_page="Upload Profile Pic";
    
 include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
   ?>
   <?php 
  $connection=connectDB();//connecting to database
  checkConnectivity();
  $id=0;
 $profession="student";
  ?>
  <?php 
   $msg_flag=false;

    if(isset($_POST['upload']))
    {
        $file_name=$_FILES['file']['name'];
        $temp_name=$_FILES['file']['tmp_name'];
        $size=$_FILES['file']['size'];
        $max_size=2097152;//2 MB precisely
        $type=$_FILES['file']['type'];
        $errors=array();
        $folder='./profile_pics/';
       if(isset($file_name)&&trim($file_name)!='')
        {
          //file has been uploaded
               if(strlen($file_name)>50)
                $errors[]="File name must be less than 50 characters";
               if($size>$max_size)//checking max size
                      $errors[]='Size must be less than 2 MB';
               if(!($type=='image/jpeg'||$type=='image/png'||$type=='image/png'))//checking type
                  $errors[]='Only image of type jpg/jpeg/png can be uploaded';

                if(empty($errors))
                  if(move_uploaded_file($temp_name,$folder.$file_name))
                  {
                  
                    if(update_image_name($file_name))
                       $msg_flag=true;
                   }
                 
        }
        else
          $errors[]='please choose an Image.';

     }
        else
        $errors[]='please upload an Image.'; 
  ?>
 <!--  redifing styles of #info in upload_pic.php -->
  <style type="text/css">
    #info{
  position: relative;
  top:70px;
  left:20px;
  width: 560px;
  color:#1A446C;
  padding-left: 50px;
  padding-top: 20px;
  padding-right: 40px;
  background: white;
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    span{
      text-decoration: underline;
      font-style: italic;
      font-weight: bold;
    }
 </style>
<div id="body">
  <div id="left_main">
   <?php navigation();
    ?>
   
  </div>
  <div id="center_main">

     <?php 
          if(!isset($_SESSION['id']))//if not logged in
            {
              echo "<h2 style='text-align:center'> Please Log in to Continue....</h2>";
            }
          else
          {//if logged in 
            if(!empty($errors))//if logged in but  some errors has been occured
           {
              echo "<div id=\"validation_errors\">";
              echo "<ul>";
              echo "<h2>Please fix follow errors...</h2>";
              foreach($errors as $value)
                  echo "<li>$value</li>"; 
              echo "</ul>";
              echo "</div>";
              show_info();//showing them their info so that they could be able to upload
            }
           else{//if logged in and  no error has occured
                  if($msg_flag==true)
                      echo "<h2 style='padding-left:30px;font-weight:normal;color:green;'>:) Image Uploaded Successfully,go to Home Page...</h2>";     
                   else
                      echo "<h2 style='padding-left:30px;font-weight:normal;color:red;'>(: Error Uploading Image,Please try again...</h2>";         
               }
          }
?>


  </div><!-- end of center main -->
<div id="right_main">
     <?php right_main();  ?>
</div>
   
</div>
<?php include("../includes/layouts/footer.php"); ?>
