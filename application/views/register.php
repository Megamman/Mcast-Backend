<div class="container td-margin mt-4 mb-3">

    <?=form_open('register/submit'); ?>
        <div class="form-group">
            <label for="InputIdNumb">ID Card Number</label>
            <input type="text" class="form-control" name="idcard" id="InputIdNumb" placeholder="Enter ID Card Number">
        </div>
        <div class="form-group">
            <label for="InputName">Name</label>
            <input type="text" class="form-control" name="name" id="InputName" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="InputSurname">Surname</label>
            <input type="text" class="form-control" name="surname" id="InputSurname" placeholder="Enter Surname">
        </div>
        <div class="form-group">
            <label for="InputEmail">Email Address</label>
            <input type="email" class="form-control" name="email" id="InputEmail" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="InputPassword">Password</label>
            <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputCourse">Course</label>
            <?php
            echo form_dropdown('role', $role_list, NULL, $dropdown_class);
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    <?=form_close();?>
</div>
