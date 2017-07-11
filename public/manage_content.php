<?php include_once("../includes/layouts/header.php");
require_once("../includes/functions.php");
?>
<?php
  if(isset($_GET['subject_id'])){
       $subject_selected_id=$_GET['subject_id'];
       $page_selected_id =null;
  }//only one can be selected at a time so can use elseif
  elseif(isset($_GET['page_id']))
  {
      $subject_selected_id=null;
      $page_selected_id =$_GET['page_id'];
  }
else{
    $subject_selected_id=null;
    $page_selected_id =null;
}
?>
<?php
$connection=connectDB();
checkConnectivity($connection);

?>
<div id="body">
    <div id="left_main_new">
    <br/>
       <?php echo navigation_new($subject_selected_id,$page_selected_id ); ?>
    </div>
    <div id="center_main" >
        <h1>Manage Content</h1>

        <?php
        strcmp()
                  $page=$subject=null;
                      if($subject_selected_id!=null)
                         $subject=find_subject_by_id($subject_selected_id); 
                       if($page_selected_id!=null) 
                        $page=find_page_by_id($page_selected_id);
                      echo $subject." : ".$page."<br/>";
       ?>
    </div>
</div>
<?php mysqli_close($connection);?>
<?php include("../includes/layouts/footer.php"); ?>
