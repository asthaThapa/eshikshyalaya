<fieldset>
    <div class="form-group">
        <label for="roll_no">Roll Number <span style="color:red">*</span></label>
          <input type="text" name="roll_no" value="<?php echo $edit ? $student['roll_no'] : ''; ?>" placeholder="8" class="form-control" required="required" id = "roll_no" >
    </div>

    <div class="form-group">
        <label>Student ID no. <span style="color:red">*</span> </label>
        <input name="s_id" value="<?php echo $edit ? $student['s_id'] : ''; ?>"  placeholder="015BIM008" class="form-control" required="required" type="text">
    </div> 
   

    <div class="form-group">
        <label for="f_name">First Name <span style="color:red">*</span></label>
          <input type="text" name="fname" value="<?php echo $edit ? $student['fname'] : ''; ?>" placeholder="First Name" class="form-control" required="required" id = "fname" >
    </div> 

    <div class="form-group">
        <label for="l_name">Last name <span style="color:red">*</span></label>
        <input type="text" name="lname" value="<?php echo $edit ? $student['lname'] : ''; ?>" placeholder="Last Name" class="form-control" required="required" id="lname">
    </div> 

    <div class="form-group">
        <label>Gender * </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="male" <?php echo ($edit &&$student['gender'] =='male') ? "checked": "" ; ?> required="required"/> Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="female" <?php echo ($edit && $student['gender'] =='female')? "checked": "" ; ?> required="required" id="female"/> Female
        </label>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
          <textarea name="address" placeholder="Address" class="form-control" id="address"><?php echo ($edit)? $student['address'] : ''; ?></textarea>
    </div> 
    
    <!-- <div class="form-group">
        <label>State </label>
           <?php $opt_arr = array("Maharashtra", "Kerala", "Madhya pradesh"); 
                            ?>
            <select name="state" class="form-control selectpicker" required>
                <option value=" " >Please select your state</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['state']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>   -->

    <div class="form-group">
        <label for="email">Email</label>
            <input  type="email" name="email" value="<?php echo $edit ? $student['email'] : ''; ?>" placeholder="E-Mail Address" class="form-control" id="email">
    </div>
      <div class="form-group">
        <label>Date of birth</label>
        <input name="date_of_birth" value="<?php echo $edit ? $student['date_of_birth'] : ''; ?>"  placeholder="Birth date" class="form-control"  type="date">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
            <input name="phone" value="<?php echo $edit ? $student['phone'] : ''; ?>" placeholder="9841329733" class="form-control"  type="text" id="phone">
    </div>

    <div class="form-group">
        <label for="phone">Batch  <span style="color:red">*</span></label>
            <input name="batch" value="<?php echo $edit ? $student['batch'] : ''; ?>" placeholder="2015" class="form-control"  type="text" id="batch">
    </div>

     <div class="form-group">
        <label for="phone">User Name</label>
            <input name="user_name" value="<?php echo $edit ? $student['phone'] : ''; ?>" placeholder="user name" class="form-control"  type="text" id="uname">
    </div>

     <div class="form-group">
        <label for="phone">Password</label>
            <input name="password" value="<?php echo $edit ? $student['phone'] : ''; ?>" class="form-control"  type="password" id="pass">
    </div>

     
  
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>