  <div id ="login" >
         <h1> Log In</h1>
    
       <form action="login.php" method="post">
       <?php if($profession=='student') { //so that radio button remain checked according to selected before
        echo "<h3> Student <input checked='checked' value ='student' name='profession'  type='radio' />  ";
        echo  "Teacher<input name='profession' value='teacher'type='radio' /></h3>";
       }
       else
       {
        echo "<h3> Student <input checked='checked' value ='student' name='profession'  type='radio' />  ";
        echo  "Teacher<input name='profession'checked='checked' value='teacher'type='radio' /></h3>";
       }
        ?> 
    <!-- table for displaying form -->
        <table>
        <tr>
        <td>
         Scholar/Employee id:</td>
         <td>
         <input type="text" name="id" value="<?php global $id;echo $id; ?>" width="25"/></td>
         <br/>
         </tr>
         <tr>
         <td>
          Password:</td>
          <td>
         <input type="password" name="password" width="25"/>
         </td>
         </tr>
          </table>
    <!-- end of table -->
            <br>
          <input type="submit" value="Log In" name="signup" />
          
          
          </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
       </div>