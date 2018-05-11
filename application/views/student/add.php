<div class="container td-margin d-flex flex-row mt-4 mb-3">
    <h5 class="card-title">Add Student</h5>
</div>

<div class="container">
    <?=form_open('student/add', array('class' => '')); ?>
        <div class="form-group">
            <label for="exampleInputID">ID no.</label>
            <input type="ID" class="form-control" id="exampleInputID" aria-describedby="idHelp" name="id_card" placeholder="Enter Student ID no.">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="Name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" name="name" placeholder="Enter Student Name">
        </div>
        <div class="form-group">
            <label for="exampleInputSurname">Surname</label>
            <input type="Surname" class="form-control" id="exampleInputSurname" aria-describedby="surnameHelp" name="surname" placeholder="Enter Student Surname">
        </div>
        <div class="form-group">
            <label for="exampleInputName">Email</label>
            <input type="Email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Student Email">
        </div>
        <div class="form-group">
            <label for="exampleInputCourse">Course</label>
            <?php
            echo form_dropdown('course', $course_list, NULL, $dropdown_class);
            ?>
        </div>
        <div class="form-group">
            <label for="exampleInputStuLink">Links</label>
            <input type="Link" class="form-control" id="exampleInputStuLink" aria-describedby="linkHelp" name="link" placeholder="Enter Student Link">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?=form_close();?>
</div>
