 <div id="signup">
    <h1>Sign Up </h1>
       <form action="signup.php" method="post">
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
     <table>
         <tr>
          <td>Scholar/Employee id:<font color="red">*</font> </td>    
           
           <td><input type="text" name="id" value="<?php echo $id; ?>"width="25"/></td>
           </tr>
           <br/>
           <tr>
           <td>First Name:<font color="red">*</font> </td>
           <td><input type="text" name="first_name" value="<?php echo $first_name ?>" width="25"/></td>
           </tr>
           <br/>
          <tr>
           <td> Last Name:<font color="red">*</font>  </td> 
           <td>
           <input type="text" name="last_name" value="<?php echo $last_name ?>" width="25"/></td>
           </tr>
           <tr>
           <td>
             Password:<font color="red">*</font>   </td>
            <td> <input type="password" name="password1" width="25"/> </td> 
        </tr>
        
        <br/>
        <tr>
        <td>
        Re-enter Password:<font color="red">*</font></td>
        <td> <input type="password" name="password2" width="25"/></td>
        </tr>
        </table>
        <br/>
       <span style="color:black"> About you(Optional):</span><br/>
        <textarea name="about_you" style="width: 365px; height: 132px " value="<?php echo $about_you ?>">  </textarea>

         
         
         <p>
           <input type="submit" value="Sign Up" name="signup"/>
         </p>
       </form>
  </div>