<style type="text/css">
   td{
     color:brown;

   }


</style>
<div id="contact_us">
  <h1>  &nbsp;&nbsp;Contact Us </h1>
   <form  method="post" action="contact_us.php?data=1">
   <table>
     
   <tr>
     <td>
       First Name:<font color="red">*</font>
       </td>
     <td>
       <input type="text" name="first_name" value="<?php echo $first_name ?>" id="textfield">
     </td>
     </tr>
     <tr>
     <td>Last Name:<font color="red">*</font>
     </td>
     <td>
       <input type="text" name="last_name"value="<?php echo $last_name ?>" id="textfield2">
     </td>
     </tr>
     <tr>
     <td>
      Email Adress<font color="red">*</font>:
       </td>
       <td>
       <input type="text" name="email" value="<?php echo $email ?>"id="textfield3">
     </td>
     </tr>
     
     </table>
      <font color="brown">Ask Any Question:<font color="red">*</font></font><br/>
     
    
       <textarea name="question" id="textarea" value="<?php echo $question ?>" cols="45" rows="8"></textarea>
     
     
     <p>
       <input type="submit" name="Submit" id="Submit" value="Submit">
     </p>
   </form>
</div> 