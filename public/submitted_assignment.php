<?php
   session_start();//at the starting of every page to tell open session file populate session super global with the values stored in it
     $cur_page="Submitted Assignement";
    
 include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
   ?>
 <?php 
 check_login();
  $connection=connectDB();
  checkConnectivity();
  $id=0;
  $profession="student";
  ?>
  <?php 
  //code of checking logged in or not
   if(isset($_SESSION['id']))
    $flag=true;
   else
    $flag=false; 
  ?>
  <style type="text/css">
   span{
    font-style: italic;
    font-family: sans-serif;
    font-weight: bold;
    text-decoration: underline;
   }
   #center_main table{
     position:relative;
      top:0px;
      background: white;
      width: 750px;
      left: 30px;
     padding-bottom: 20px;
   }
    #center_main table th,#center_main h2{
      font-size: 20px;
      text-align: center;
         font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    
      border: none;
      color: #CC0000;
    }
     #center_main table td {
      border: none;
      text-align: center;
         font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;

     }
  </style>
<div id="body">
 <div id="left_main"> <?php  navigation() ?></div>
 <div id="center_main">
      <h2 style="font-size: 30px">Your Submitted Assignments </h2>
      
      <?php 
        $query="SELECT * FROM assignments ";
        $query.="WHERE student_id={$_SESSION['id']}";
        $result=mysqli_query($connection,$query);
        confirm_query($result);
        $sno=1;
        
        echo "<table cellpading='20px' cellspacing='10px' >";
        echo "<tr>";
        echo "<th>Sno.</th>";
        echo "<th>Title</th>";
        echo "<th>Submitted To</th>";
        echo "<th>File Name</th>";
        echo "</tr>";
        
        if(mysqli_num_rows($result)==0)//no row in data
        {
          echo "<tr>";
        
            echo "<td colspan='4'> No submission till now..</td>"; 
            
          echo "</tr>";

        }
        else{//more at least one row
          while($result_tuple=mysqli_fetch_assoc($result))
          {
            echo "<tr>";
            echo "<td>".$sno++."</td>"; 
            echo "<td>".$result_tuple['title']."</td>"; 
            $teacher_data=get_data_by_id($result_tuple['teacher_id'],"teacher");
            echo "<td> Prof.".$teacher_data['first_name']." ".$teacher_data['last_name']."</td>"; 
            echo "<td><a href='./uploads/{$result_tuple['file_name']}'>".$result_tuple['file_name']."</td>"; 
            echo "</tr>";
          }
        }
        echo "</table>";
        ?>
     
 </div>
 <div id="right_main" >   
   <?php
      show_recent_posts();
   ?>
  </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
