<fieldset>
    <div class="form-group">
        <label for="t_id">Teacher id <span style="color:red">*</span></label>
          <input type="text" name="t_id" value="<?php echo $edit ? $teacher['t_id'] : ''; ?>" placeholder="1" class="form-control" required="required" id = "t_id" >
    </div>

   
    <div class="form-group">
        <label for="f_name">First Name <span style="color:red">*</span></label>
          <input type="text" name="fname" value="<?php echo $edit ? $teacher['fname'] : ''; ?>" placeholder="First Name" class="form-control" required="required" id = "fname" >
    </div> 

    <div class="form-group">
        <label for="l_name">Last name <span style="color:red">*</span></label>
        <input type="text" name="lname" value="<?php echo $edit ? $teacher['lname'] : ''; ?>" placeholder="Last Name" class="form-control" required="required" id="lname">
    </div> 

    <div class="form-group">
        <label>Gender * </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="male" <?php echo ($edit &&$teacher['gender'] =='male') ? "checked": "" ; ?> required="required"/> Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="female" <?php echo ($edit && $teacher['gender'] =='female')? "checked": "" ; ?> required="required" id="female"/> Female
        </label>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
          <textarea name="address" placeholder="Address" class="form-control" id="address"><?php echo ($edit)? $teacher['address'] : ''; ?></textarea>
    </div> 
    
    
    <div class="form-group">
        <label for="email">Email</label>
            <input  type="email" name="email" value="<?php echo $edit ? $teacher['email'] : ''; ?>" placeholder="E-Mail Address" class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="email">phone number</label>
            <input  type="text" name="phone" value="<?php echo $edit ? $teacher['phone'] : ''; ?>" placeholder="Phone number" class="form-control" id="phone">
    </div>

      <div class="form-group">
        <label>Date of birth</label>
        <input name="date_of_birth" value="<?php echo $edit ? $teacher['date_of_birth'] : ''; ?>"  placeholder="Birth date" class="form-control"  type="date">
    </div>

    <div class="form-group">
        <label>Subject </label>
           <?php $opt_arr = array("Cyber Law", "HRM", "Business Environment", "Finance", "Software engineering"); 
                            ?>
            <select name="subject" class="form-control selectpicker" required>
                <option value=" " >Please select Subject</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $teacher['subject']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>  



    <div class="form-group">
        <label for="f_name">User Name <span style="color:red">*</span></label>
          <input type="text" name="fname" value="<?php echo $edit ? $teacher['username'] : ''; ?>" placeholder="user Name" class="form-control" required="required" id = "uname" >
    </div> 


    <div class="form-group">
        <label for="phone">Password</label>
            <input name="password" value="<?php echo $edit ? $teacher['phone'] : ''; ?>" class="form-control"  type="password" id="pass">
    </div>

     
  
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>