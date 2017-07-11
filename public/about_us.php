<?php
   session_start();
    $cur_page="Contact Us"; 
     include_once("../includes/layouts/header.php");
     require_once("../includes/functions.php");
      $connection=connectDB();
     checkConnectivity();
 ?>
<div id="body">
  <div id="left_main">
  <br/>
    <?php echo navigation()?>

  </div>
  <div id="center_main">
   <h2>  About Us </h2>
    <p style="font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; margin:10px;">Moodle is a Website which let Student and Teachers to communicate ,it alswo allows, 
    students to submit their projects or assignments directly to the respective teachers. 
    All Copyrights of this website belongs to Manit, Bhopal.  </p>
    <h2>  Developed By  </h2>
    <ul style="list-style-type:!important; list-stylefont-style:normal;font-size:24px; font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', 'DejaVu Sans', Verdana, sans-serif';">
   <li> Ashish Patel(PHP developer) <a href="http://www.facebook.com/ashish200893"> <img src="images/fb.png"/></a></li>
      <li>Neetesh Pateriya(Web Designer) <a href="https://www.facebook.com/neetesh.pateriya.3"> <img src="images/fb.png"/></a></li>
      <li>Anurag Gupta(Project Tester)  <a href="http://www.facebook.com/ashish200893" title="facebook link"> <img src="images/fb.png"/></a></li>
      <li>Amit Kushwah(Web Designer) <a href="http://www.facebook.com/ashish200893" > <img src="images/fb.png"/></a></li>
      <li>Divyansh Khatri(Database Manager)<a href="http://www.facebook.com/ashish200893"><img src="images/fb.png"/></a></li>
      <li>Vivek Gupta(Project Manager)<a href="http://www.facebook.com/ashish200893"><img src="images/fb.png"/></a></li>
    </ul>
    </div>
    <div id="right_main">
      <?php right_main(); ?>
    </div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
