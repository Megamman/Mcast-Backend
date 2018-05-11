<div class="container td-margin mt-4 mb-3">

    <?=form_open('register/submit'); ?>
        <div class="form-group">
            <label for="InputIdNumb">ID Card Number</label>
            <input type="text" class="form-control" name="idcard" id="InputIdNumb" aria-describedby="idnumbHelp" placeholder="Enter ID Card Number">
        </div>
        <div class="form-group">
            <label for="InputName">Name</label>
            <input type="text" class="form-control" name="name" id="InputName" aria-describedby="nameHelp" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="InputSurname">Surname</label>
            <input type="text" class="form-control" name="surname" id="InputSurname" aria-describedby="surnameHelp" placeholder="Enter Surname">
        </div>
        <div class="form-group">
            <label for="InputEmail">Email Address</label>
            <input type="email" class="form-control" name="email" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter Email">
        </div>
        <div class="form-group">
            <label for="InputPassword">Password</label>
            <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password">
        </div>

        <label for="InputPassword">User Type</label>
        <div class="row m-auto">

            <div class="form-check col-auto">
                <input type="radio" class="form-check-input" id="studCheck">
                <label class="form-check-label" for="exampleCheck1">Student</label>
            </div>

            <div class="form-check col-auto mx-4">
                <input type="radio" class="form-check-input" id="lectCheck">
                <label class="form-check-label" for="exampleCheck1">Lecturer</label>
            </div>

            <div class="form-check col-auto">
                <input type="radio" class="form-check-input" id="adminCheck">
                <label class="form-check-label" for="exampleCheck1">Admin</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    <?=form_close();?>
</div>
